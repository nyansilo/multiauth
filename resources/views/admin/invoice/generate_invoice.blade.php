<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    
<style>
 font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}
.issue {
    margin-bottom: 6px;
 
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 18cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 5px;
}

#client {


  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

#client table th,
#client table td {
  padding: 5px;
  background: #ffffff;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}


#invoice table th,
#invoice table td {
  padding: 5px;
  background: #ffffff;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}


table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #57B223;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #57B223;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #57B223;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}
</style>
</head>
  <body>
    <header class="clearfix">
      <div id="logo">
 
        <img src="{{ public_path('img/logo-icon.png')}}">
      </div>
      <div id="company">
        <h2 class="name"> COLLEGE OF BUSINESS EDUCATION </h2>
        <h4>
            <div>MWANZA</div>
            <div>STORE REQUISTION</div>
        </h4>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
            <h3>
            <div class="address">Campus: Mwanza</div>
            <div class="email">Department: {{ $order->user->department->name}}</div>
            </h3>   
        </div>
        <div id="invoice">
          <h3>
            <div class="date">No: {{ $order->id}}</div>
            <div class="date">Date: {{ $order->created_at->format('d-m-Y h:i A')}}  </div>
          </h3> 
        </div>
      </div>
      <div class="issue">Please issue the following items</div>

      @role(['admin', 'pmu'])

             @include('admin.invoice.invoice_detail_table') 

      @endrole

      <div id="client">

        <table>
          <tbody>
              <tr><b>Approved By:</b></tr>
              <tr>
                <td style="text-align:right;">Position: </td>
                <td style="text-align:left;"> <b>{{ $order->approver->position }} </b></td>
              </tr>
              <tr>
                <td style="text-align:right;">Name:  </td>
                <td style="text-align:left;"> <b> {{ $order->approver->fullName }} </b> </td>
              </tr>
              <tr>
                <td style="text-align:right;">Signature:</td>
                <td style="text-align:left;"> <b> {{ $order->approver_sign }} </b></td>
              </tr>
           
          </tbody>
        </table>
      </div>
      <div id="invoice">
  
        <table>
          <tbody>
              <tr><b>Requested By:</b></tr>
              <tr>
                <td style="text-align:right;">Position: </td>
                <td style="text-align:left;"> <b>{{ $order->user->position }}</b> </td>
              </tr>
              <tr>
                <td style="text-align:right;">Name: </td>
                <td style="text-align:left;"><b>{{ $order->user->fullName }} </b></td>
              </tr>
              <tr>
                <td style="text-align:right;">Signature: </td>
                <td style="text-align:left;"> <b> {{ $order->user_sign  }}</b></td>
              </tr>
           
          </tbody>
        </table>

      </div>
   
      
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>