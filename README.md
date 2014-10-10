benzinga-php
============
The public url for this app is : http://fathomless-everglades-9983.herokuapp.com/

Features:

1) Each user will be given $100,000.00 in cash to create their portfolio when they land on this page.
2) With the search box on the top corner, the user will be able to loopup the share details based on the company code.
3) When the user searches with the company code, if the code is not found in the database of the external API,
   an error message is returned saying "The code you entered could not be found", else we get back the company details.
4) Buying: ( Ask price is used for this. )
   a) The user is now be able to buy any of the shares with the cash balance he has.
   b) If he tries to purchase the shares that makes his cash balance negative,
      an error message is displayed saying: "You do not have enough credit to make this transaction".
      Otherwise, the company and the number of shares purchased gets added to his portfolio
      (which is on the right side of the page) and the cash balance is updated to reflect the recent purchase made.
5) Selling: ( Bid price is used for this. )
   a) When user tries to sell a share, we first check if that user has the shares of this company in his portfolio.
      If he has it, we proceed, else we show an error message saying "You do not have these shares in your portfolio".
   b) If the user owns 10 shares from a company and if he tries to sell 15 shares(any number greater than 10),
      we display an error message saying "You cannot sell more shares than you currently have available in your portfolio".
   c) If the user sells all the shares of a company that he currently owns, the company name gets deleted from his portfolio,
      and the cash balance gets added with the money from the recent transaction.
   d) If the user sells some of the shares that he currently owns: the number of shares will be reduced from his portfolio,
      and the cash balance is updated.
6) There is a button "View Stock" whose functionality is not mentioned in the code challenge.
      
