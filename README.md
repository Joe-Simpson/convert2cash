# Requirments
Some 'fields' look to be more specific to the service being provided than the stock/item itself. Below is an attempt at picking apart what has been requested and what is actually required.

## Services
### Buy Back
- Loan Amount
- Term of Buyback
  - 1 week
  - 2 weeks
  - 3 weeks
  - 1 month
- Tabs {1?}
  - Buyback
  - Renew
  - Clone
  - Seize

### Buy In
More typical laon shop type stuff.
"Buy my stuff, I don't want it back"
Do we need to track who sold the item. That is to say, add a new client.
- Passcode
- Cost price
- Pay cash
- Selling price

## Processes
### Sales
1. Operator/User
2. Find item from stock
   - Option to add customer details
3. Adjust price (if needed)
4. Payment
   - Cash
   - Card

### Deposit Scheme
1. Operator
2. Find item from stock
3. Add customer details
4. Adjust selling price if item
5. Deposit required
   - Minimum £20
6. Additional payment
7. Complete sale
8. Option to cancel layaway

## Known tables and fields
### stock fields
- make
- model
- description
- serial/imei
- passcode {2?}
- boxed [true/false]
- condition
  - ENUM
    - Like New
    - Good
    - Fair
    - Poor
    - Faulty/Damaged
- notes
- operator/user {3?}

## Questions we need to answer {?}
1. Tabs
   - Not sure what these are meant to do. They could be ways of interacting with the 'deal'.
     - Buyback = Customer wants their item back
     - Renew = Start the 'deal' again
     - Clone = Copy it (for some reason). 
     - Seize = Close 'deal' taking ownership of the stock
4. Search [done]
   - build something
   - search: "laravel search"

## Known Issues
1. Deleting stock item before buy-in, buy-back record causes an error [fixed]
   - Same will happen if you delete a client
   - issue is due to the index table trying to access stock and client data
   - fix by adding ifexists()
2. Clients
   - Add postcode search functionality - done
   - Add extra Id field and increase id options - done
     - id 1
       - Driving licence
       - passport
       - birth certificate
       - photo id card
       - bank card
       - bus pass
       - NI card
     - id 2
       - Utility Bill
       - pay slip
       - bank statement
       - an in date letter
   - All notes need to be date stamped with the newest info at the top of the page
   - Customer banned requires a text box for a reason - done
   - Customer photo required
3. Buy-In
   - Under item details, require a drop down for categories - done
     - gaming
     - phones
     - computing
     - electronics
     - airguns
     - jewellery
     - tools
     - misc
   - remove pay cash field - done
   - tick box for 'passcode/security lock checked and removed' (compulsory)
4. Buy-Back
   - Under item details, require a drop down for categories - done
     - gaming
     - phones
     - computing
     - electronics
     - airguns
     - jewellery
     - tools
     - misc
   - tick box for 'passcode/security lock checked and removed' (compulsory)
   - Under edit - buy-backs should not be able to be deleted. They can be cancelled on the day it is taken out. This should be recorded. -> checkbox - delete button removed (route still exists), cancelled still required.
   - Require buyback history of the previous transactions with the customer
     - how many in total
     - redeemed: total and %
     - seized: total and %
5. Stock view
   - Stock will require a stock no. or barcode. This should also have item description.
     - Currently assuming stock_id will suffice?
   - stock code search
6. Stock delete
   - Remove stock delete option and replace it with a Stock Loss drop down with the following options - delete button removed (route still exists), stock loss still required.
     - Scrap jewellery
     - Employees loss
   - Will require text box so reason can be added