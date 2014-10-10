<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Benzinga Code Challenge</title>
       <style>
              #header {
                  width: 100%;
                  float: left;
                  border-bottom: 1px solid black;
                  padding-top: 15px;
                  padding-bottom: 15px;
                  font-weight: bold;
              }
              #header-left {
                  width: 50%;
                  float: left;
              }
              #header-right {
                  width: 50%;
                  float: right;
              }
              #body {
                  width: 100%;
                  float: left;
                  padding-top: 20px;
              }
              #body-left {
                  width: 50%;
                  float: left;
              }
              #body-right {
                  width: 50%;
                  float: left;
              }
              #br-top {
                  width: 100%;
                  float: left;
                  font-weight: bold;
              }
              #br-top .left {
                  float: left;
                  text-align: left;
                  width: 50%;
              }
              #br-top .right {
                  float: left;
                  text-align: left;
                  width: 50%;
              }
              #cash, #text {
                  float: left;
              }
              #symbol {
                  float: left;
              }
              #lookup {
                  float: left;
                  width: 75px;
                  font-weight: normal;
                  height: 21px;
                  background-color: buttonface;
                  border: 1px solid black;
                  margin-left: 15px;
                  text-align: center;
                  cursor: pointer;
                  line-height: 1.3em;
              }
              #companyname {
                  font-weight: bold;
                  width: 100%;
                  float: left;
              }
              #row1 {
                  width: 85%;
                  float: left;
                  font-weight: bold;
                  padding-left: 20px;
                  padding-right: 10px;
                  border: 1px solid black;
              }
              .lrow1, .rrow1 {
                  width: 50%;
                  float: left;
              }
              #row2 {
                  width: 85%;
                  float: left;
                  padding-left: 20px;
                  padding-right: 10px;
                  border-bottom: 1px solid black;
                  border-left: 1px solid black;
                  border-right: 1px solid black;
              }
              .rrow2 {
                  width: 50%;
                  float: left;
                  padding-left: 23px;
              }
              .lrow2 {
                  width: 45%;
                  float: left;
                  border-right: 1px solid black;
              }
              body {
                  line-height: 2.0em;
                  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                  text-transform: none;
                  letter-spacing: normal;
                  font-size: 14px;
              }
              .bid-btns {
                  float: left;
                  width: 85%;
                  padding-top: 20px;
              }
              #qty, #buy, #sell {
                  float: left;
                  margin-right: 20px;
              }
              #buy, #sell {
                  width: 50px;
                  font-weight: normal;
                  height: 21px;
                  background-color: buttonface;
                  border: 1px solid black;
                  text-align: center;
                  cursor: pointer;
                  line-height: 1.3em;
              }
              #stocktable {
                  float: left;
                  width: 90%;
              }
              #stockhead {
                  float: left;
                  width: 100%;
                  border: 1px solid black;
              }
              #stockdata {
                  float: left;
                  width: 100%;
                  border-bottom: 1px solid black;
                  border-right: 1px solid black;
                  border-left: 1px solid black;
              }
              .second, .third, .srow, .trow {
                  float: left;
                  width: 15%;
                  text-align: center;
              }
              .first, .frow {
                  float: left;
                  width: 42%;
                  text-align: center;
              }
              .fourth, .forow {
                  float: left;
                  width: 24%;
                  text-align: center;
              }
              #stockrow {
                  float: left;
                  width: 100%;
                  padding-top: 15px;
                  padding-bottom: 15px;
              }
              #view {
                  float: left;
                  min-width: 95px;
                  margin-left: 30px;
                  background-color: buttonface;
                  border: 1px solid black;
                  cursor: pointer;
              }
       </style>
</head>
<body>
      <script>
              var totalcash = 100000;
              var availablecash = 100000;
              var cashspent = 0;
              var lookupsymbol = '';
      </script>
      <div id="header">
           <div id="header-left">Simple Stock Exchange</div>
           <div id="header-right">
                <input type="text" name="symbol" id="symbol" placeholder="Enter Symbol">
                <div id="lookup">Lookup</div>
           </div>
      </div>
      <div id="body">
            <div id="body-left"></div>
            <div id="body-right">
                 <div id="br-top">
                      <div class="left">Current Portfolio</div>
                      <div class="right"><div id="text">Cash: $</div><div id="acash"></div></div>
                 </div>
                 <div id="stocktable"></div>
            </div>
      </div>
</body>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
        function displaySymbolData(symbol) {
            var url = 'http://data.benzinga.com/stock/'+symbol;
            $.get( url, function( data ) {
                if(typeof data.status != 'undefined') {
                    $("#body-left").text('The code you entered could not be found');
                } else {
                    var name = data.name;
                    var bid = data.bid;
                    var ask = data.ask;
                    var returndata = '';
                    returndata+= '<div id="companyname">'+name+'</div>';
                    returndata+= '<div id="row1"><div class="lrow1">Bid</div><div class="rrow1">Ask</div></div>';
                    returndata+= '<div id="row2"><div class="lrow2">'+bid+'</div><div class="rrow2">'+ask+'</div></div>';
                    returndata+= '<div class="bid-btns"><input type="text" name="qty" id="qty" placeholder="Quantity"><div id="buy" onclick="buyclick();">Buy</div><div id="sell" onclick="sellclick();">Sell</div></div>';
                    $("#body-left").html(returndata);
                }
            });
            return;
        }
        $(document).ready(function () {
            $("#acash").text(availablecash);
        });
        $( "#lookup" ).click(function() {
            lookupsymbol = $("#symbol").val();
            if(lookupsymbol) {
                displaySymbolData(lookupsymbol);
            } else {
                alert("Please enter a symbol");
            }
        });
        function buyclick() {
            var qtyno = $("#qty").val();
            if(qtyno) {
                var url = 'http://data.benzinga.com/stock/'+lookupsymbol;
                $.get( url, function( data ) {
                    if(typeof data.status != 'undefined') {
                        alert('The code you entered could not be found');
                    } else {
                        var asknumber = data.ask;
                        var total = parseInt(qtyno*asknumber);
                        if(total >= parseInt(availablecash)) {
                            alert('You do not have enough credit to make this transaction');
                        } else {
                            if(typeof portfolio[data.symbol] != 'undefined') {
                                var existing_qty = portfolio[data.symbol]['quantity'];
                                var new_qty = qtyno;
                                var total_qty = parseInt(new_qty) + parseInt(existing_qty);
                                portfolio[data.symbol]['quantity'] = total_qty;
                            } else {
                                portfolio[data.symbol] = new Array();
                                portfolio[data.symbol]['name'] = data.name;
                                portfolio[data.symbol]['quantity'] = qtyno;
                                portfolio[data.symbol]['pricepaid'] = data.ask;
                                portfolio[data.symbol]['pricesold'] = data.bid;
                            }
                            availablecash = availablecash - (qtyno*data.ask);
                            var stocktable = '';
                            stocktable += '<div id="stockhead"><div class="first">Company</div><div class="second">Quantity</div><div class="third">Price Paid</div><div class="fourth"></div></div>';
                            stocktable += '<div id="stockdata">';
                            for (var key in portfolio) {
                                stocktable += '<div id="stockrow"><div class="frow">'+portfolio[key]['name']+'</div><div class="srow">'+portfolio[key]['quantity']+'</div><div class="trow">'+portfolio[key]['pricepaid']+'</div><div class="forow"><div id="view">View Stock</div></div></div>';
                            }
                            stocktable += '</div>';
                            $("#acash").text(availablecash);
                            $("#stocktable").html(stocktable);
                        }
                    }
                });
            } else {
                alert('Please enter the quantity');
            }
        }
        function sellclick() {
            var qtyno = $("#qty").val();
            if("undefined" !== typeof portfolio[lookupsymbol.toUpperCase()]) {
                if(qtyno) {
                    var current_qty = portfolio[lookupsymbol.toUpperCase()]['quantity'];
                    if(parseInt(qtyno) > parseInt(current_qty)) {
                        alert('You cannot sell more shares than you currently have available in your portfolio.');
                    } else if(parseInt(qtyno) == parseInt(current_qty)) {
                        var sellingprice = portfolio[lookupsymbol.toUpperCase()]['pricesold'];
                        delete portfolio[lookupsymbol.toUpperCase()];
                        availablecash = availablecash + (qtyno*sellingprice);
                        var stocktable = '';
                        stocktable += '<div id="stockhead"><div class="first">Company</div><div class="second">Quantity</div><div class="third">Price Paid</div><div class="fourth"></div></div>';
                        stocktable += '<div id="stockdata">';
                        for (var key in portfolio) {
                            stocktable += '<div id="stockrow"><div class="frow">'+portfolio[key]['name']+'</div><div class="srow">'+portfolio[key]['quantity']+'</div><div class="trow">'+portfolio[key]['pricepaid']+'</div><div class="forow"></div></div>';
                        }
                        stocktable += '</div>';
                        $("#acash").text(availablecash);
                        $("#stocktable").html(stocktable);
                    } else {
                        var sellingprice = portfolio[lookupsymbol.toUpperCase()]['pricesold'];
                        availablecash = availablecash + (qtyno*sellingprice);
                        var existing_qty = portfolio[lookupsymbol.toUpperCase()]['quantity'];
                        var sell_qty = qtyno;
                        var total_qty = parseInt(existing_qty) - parseInt(sell_qty);
                        portfolio[lookupsymbol.toUpperCase()]['quantity'] = total_qty;
                        var stocktable = '';
                        stocktable += '<div id="stockhead"><div class="first">Company</div><div class="second">Quantity</div><div class="third">Price Paid</div><div class="fourth"></div></div>';
                        stocktable += '<div id="stockdata">';
                        for (var key in portfolio) {
                            stocktable += '<div id="stockrow"><div class="frow">'+portfolio[key]['name']+'</div><div class="srow">'+portfolio[key]['quantity']+'</div><div class="trow">'+portfolio[key]['pricepaid']+'</div><div class="forow">View Stock</div></div>';
                        }
                        stocktable += '</div>';
                        $("#acash").text(availablecash);
                        $("#stocktable").html(stocktable);
                    }
                } else {
                    alert('Please enter the number of shares you wish to sell.');
                }
            } else {
                alert('You do not have these shares in your portfolio.');
            }
        }
        var portfolio = new Array();
</script>
</html>
