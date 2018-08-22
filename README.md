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
- Passcode {2?}
- Cost price
- Pay cash {5?}
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
4. Adjust selling price of item
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
     - Renew = Start 'deal' again
     - Clone = Copy it (for some reason)
     - Seize = Close 'deal' taking ownership of the stock
2. Passcode
   - It was specified that this is required for Buy In only. Maybe that was an error.
   - Suspect it is for mobile phone, laptop, etc. passcodes.
   - Adding to stock table
3. Operator
   - I assume this is to track who logs various stock, sales, etc.
   - Plan to use the User table, they will be required to sign in/out as required.
     - Can make this a simpler process
       - Dropdown quick select of user
       - Prompt for password
4. Search
   - build something
   - search: "laravel search"
5. Pay cash
   - email Emma face for clarification
   - could be wetehr they paid cash or cash price for selling it