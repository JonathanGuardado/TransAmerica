
delimiter #
drop trigger `ingreso_llantas`#
    
    CREATE  TRIGGER `ingreso_llantas` AFTER INSERT
    ON `ta_frontaccounting_db`.`0_grn_items`
    FOR EACH ROW 
    
    begin
            DECLARE ID_LLANTA , NUM_LLANTAS  ,  category,  a int Default 0 ;
        DECLARE DESC_LLANTA, SUP_NAME, SUP_REFF  varchar(250);
        DECLARE price float;
    
    
    
             select itm.`qty_recd`, ic.`description` ,ic.`category_id`  , od.`unit_price`  , sp.`supp_name`, sp.`supp_ref`
         into NUM_LLANTAS , DESC_LLANTA   ,category   , price , SUP_NAME, SUP_REFF
    from `ta_frontaccounting_db`.`0_grn_items` itm 
        ,`ta_frontaccounting_db`.`0_purch_order_details` od
        ,`ta_frontaccounting_db`.`0_purch_orders` ord
        ,`ta_frontaccounting_db`.`0_item_codes` ic
        ,`ta_frontaccounting_db`.`0_suppliers` sp
        where itm.`po_detail_item` = od.`po_detail_item`
        and ic.`item_code` = itm.`item_code`
        and od.`order_no` = ord.`order_no`
        and ord.`supplier_id` = sp.`supplier_id`
        and  itm.`id` = NEW.`id`
        ;
        
    if category = 5 then 

         select max( cast(idllanta as UNSIGNED integer ) ), NEW.`qty_recd`
         into ID_LLANTA, NUM_LLANTAS
         from `db_transamerica`.`llanta`;
         if ID_LLANTA is null then
         set ID_LLANTA = 1;
         end if;
                  
         simple_loop: LOOP
             SET a=a+1;
             
             IF a=NUM_LLANTAS+1 THEN
                LEAVE simple_loop;
             ELSE
             
             SET ID_LLANTA = ID_LLANTA +1;
             
             INSERT INTO `db_transamerica`.`llanta` (`idllanta`, `descripcion_llanta`, `serie_llanta`, `tamanio_llanta`, `marca_llanta`, `estado_llanta`, `fecha_asignacion`, `fecha_compra`, `fecha_desecho`) VALUES
    (ID_LLANTA, NEW.`description` , ID_LLANTA,  22, SUP_REFF, 'T', NULL, CURDATE(), NULL);
            
             END IF;
             
       END LOOP simple_loop;
       
     end if;
END#