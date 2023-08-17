<?php  


select `extbooks_accounting`.`invoice_master`.`WarehouseID` AS `WarehouseID`,`extbooks_accounting`.`warehouses`.`name` AS `WarehouseName`,
`extbooks_accounting`.`invoice_detail`.`ItemID` AS `ItemID`,`extbooks_accounting`.`item`.`ItemName` AS `ItemName`,
`extbooks_accounting`.`item`.`UnitName` AS `UnitName`,
sum(if((left(`extbooks_accounting`.`invoice_detail`.`InvoiceNo`,2) = 'CN'),
`extbooks_accounting`.`invoice_detail`.`Qty`,0)) AS `SaleReturn`,
sum(if((left(`extbooks_accounting`.`invoice_detail`.`InvoiceNo`,3) = 'BIL'),`extbooks_accounting`.`invoice_detail`.`Qty`,0)) AS `QtyIn`,
sum(if((left(`extbooks_accounting`.`invoice_detail`.`InvoiceNo`,3) = 'TAX'),`extbooks_accounting`.`invoice_detail`.`Qty`,0)) AS `QtyOut`,
sum(if((left(`extbooks_accounting`.`invoice_detail`.`InvoiceNo`,3) = 'POS'),`extbooks_accounting`.`invoice_detail`.`Qty`,0)) AS `POSOut`,
(sum((if((left(`extbooks_accounting`.`invoice_detail`.`InvoiceNo`,3) = 'BIL'),`extbooks_accounting`.`invoice_detail`.`Qty`,0) + if((left(`extbooks_accounting`.`invoice_detail`.`InvoiceNo`,2) = 'CN'),
`extbooks_accounting`.`invoice_detail`.`Qty`,0))) - (sum(if((left(`extbooks_accounting`.`invoice_detail`.`InvoiceNo`,3) = 'TAX'),`extbooks_accounting`.`invoice_detail`.`Qty`,0)) + sum(if((left(`extbooks_accounting`.`invoice_detail`.`InvoiceNo`,3) = 'POS'),`extbooks_accounting`.`invoice_detail`.`Qty`,0)))) AS `Balance` from (((`extbooks_accounting`.`invoice_detail` join `extbooks_accounting`.`item` on((`extbooks_accounting`.`invoice_detail`.`ItemID` = `extbooks_accounting`.`item`.`ItemID`))) join `extbooks_accounting`.`invoice_master` on((`extbooks_accounting`.`invoice_detail`.`InvoiceMasterID` = `extbooks_accounting`.`invoice_master`.`InvoiceMasterID`))) join `extbooks_accounting`.`warehouses` on((`extbooks_accounting`.`warehouses`.`id` = `extbooks_accounting`.`invoice_master`.`WarehouseID`))) group by `extbooks_accounting`.`invoice_detail`.`ItemID`,`extbooks_accounting`.`item`.`ItemName`,`extbooks_accounting`.`item`.`UnitName`,`extbooks_accounting`.`invoice_master`.`WarehouseID`,`extbooks_accounting`.`warehouses`.`name`
?>
