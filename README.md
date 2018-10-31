1. Client details
   - Client notes time stamped [1] Done
     - most recent at the top
   - Buyback stats on the details page [2] Formatting/layout done
     - percentages successful, failed, ongoing, etc.
     - Clearly, at a glance, see if they are a 'good' customer or not
   - Client picture needs to be updateable [6] Done
2. Buy Ins (Done)
   - Button should be in the client deatils, not client list [2] Done
     - This gives the user and idea of how much activity the client has
3. Buybacks
   - Button should be in the client details, not client list [2] Done
     - This gives the user an idea of how indebted the client is
   - Multiple items [5]
     - Entered under one buyback
     - Multiple items listed as seperate stock
     - Clone needs to have a selector for which items need cloning
   - Late fees [4]
     - £5 each week (if =<£50)
     - 10% each week (if >£50)
4. Stock
   - Seized [3]
     - change from true/false to yes/no
     - Who was it seized from
   - Boxed [1] Done
     - change from true/false to yes/no
   - Stock number [2] Done
     - use id, set to 8 digits
     - basically a barcode
5. Sales
   - Client details not neccessairly requried [2]
     - aka "optional"
   - Multiple items in one sale [6]
6. Lay away
   - Seperate page not bundled into sales [4]
7. Homepage
   - Impending things that will require attention [3]
     - Buybacks set to expire
     - Buybacks that have expired
8. Selling price is 3x the loan amount [2]
   - This can be auto filled
9. Receipts [4]
   - Require printable receipts
     - Purchase Agreement and Receipt for Goods
     - Sale and Repurchase Agreement and Receipt for Goods Sold
   - Example has been provided
   - Terms and Conditions required at bottom
     - text in examples provided
   - Should be a simple form that gets populated with required details
10. Reports [9]
   - Basically keeping track of the til
   - Will need to be store specific
     - This may complicate things that have already been built a bit
   - End of the day, whats been sold on cash and on card
   - Separate summations
     - Not individaul items
   - "Close"
     - details of individual items in a receipt/report style fashion
   - Running total of whats in the til
     - Will require method of adding/removing cash from the til
   - Currently use Eposnow
   - Some way of populating excel for Emily
     - May need to populate a template?
11. Nice to have - Texting customers [7]
    - Currently using a service called Green Text
      - Pay per click. Bought in bulk for the week.
      - Have to log in to separate program, enter number manually, etc.
    - Would like something integrated
      - Click a button to fire off a text
        - "You have 1 day til you are due"
        - "You are overdue"
        - "You are 1 week over, we will seize your item"
      - Twillio?