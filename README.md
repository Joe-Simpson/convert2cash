# Buy In & Buy Back requirments
Some 'fields' look to be more specific to the service being provided than the stock/item itself

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
- Passcode {2?}
- Cost price
- Pay cash
- Selling price

## Known tables and fields
### stock fields
- make
- model
- description
- serial/imei
- passcode {2?}
- boxed [true/false]
- condition [like new/good/fair/poor/faulty or damaged]->[seperate table]
- notes
- operator {3?}

### stock_condition fields
- Like New
- Good
- Fair
- Poor
- Faulty/Damaged


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
3. Operator
   - I assume this is to track who logs various stock, sales, etc.
   - Expect a dropdown will suffice for this. Staff probably dont want to sign in and out for each sale/process.