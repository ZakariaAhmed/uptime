SELECT customers.customerName, urlcustomers.urlLink FROM customers LEFT join urlcustomers on customers.customerId = urlcustomers.customerId;