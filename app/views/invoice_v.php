<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>postaplus</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/invoice/style.css" media="all" />
    <link rel="icon" type="image/png" href="favicon.ico">
    
    <style>
        @media print {

  html, body {
    height:100%; 
    margin: 0 !important; 
    padding: 0 !important;
    overflow: hidden;
  }

}
        
    </style>
  </head>
  <body  onload="window.print()">
    <header class="clearfix">
      <div id="logo">
        <img src="<?=base_url()?>assets/assets/images/users/avatar.jpg">
      </div>
      <h1>INVOICE</h1>
      
      <div id="company" class="clearfix">
        <div>Postaplus</div>
        <div>kakkanad, Kochi<br />Kerala</div>
        <div></div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
          <div><span>Inovoice No:</span> &nbsp;<?=$result->order_no?></div>
        <div><span>CLIENT</span> <?=$result->first_name.' '?></div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="service">SEO</td>
            <td class="desc">Optimize the site for search engines (SEO)</td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
            <td class="total">$800.00</td>
          </tr>
          <tr>
            <td class="service">Training</td>
            <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
            <td class="total">$160.00</td>
          </tr>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
<!--    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>-->
  </body>
</html>