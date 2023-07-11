<!DOCTYPE HTML
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
  xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
  <title></title>

  <style type="text/css">
    @media only screen and (min-width: 620px) {
      .u-row {
        width: 600px !important;
      }

      .u-row .u-col {
        vertical-align: top;
      }

      .u-row .u-col-33p33 {
        width: 199.98px !important;
      }

      .u-row .u-col-100 {
        width: 600px !important;
      }

    }

    @media (max-width: 620px) {
      .u-row-container {
        max-width: 100% !important;
        padding-left: 0px !important;
        padding-right: 0px !important;
      }

      .u-row .u-col {
        min-width: 320px !important;
        max-width: 100% !important;
        display: block !important;
      }

      .u-row {
        width: 100% !important;
      }

      .u-col {
        width: 100% !important;
      }

      .u-col>div {
        margin: 0 auto;
      }

      .no-stack .u-col {
        min-width: 0 !important;
        display: table-cell !important;
      }

      .no-stack .u-col-33p33 {
        width: 33.33% !important;
      }

    }

    body {
      margin: 0;
      padding: 0;
      font-family:'Montserrat',sans-serif;
    }

    table,
    tr,
    td {
      vertical-align: top;
      border-collapse: collapse;
    }

    p {
      margin: 0;
    }

    .ie-container table,
    .mso-container table {
      table-layout: fixed;
    }

    * {
      line-height: inherit;
    }

    a[x-apple-data-detectors='true'] {
      color: inherit !important;
      text-decoration: none !important;
    }

    table,
    td {
      color: #000000;
    }

    @media (max-width: 480px) {
      #u_row_4 .v-row-background-image--inner {
        background-position: right bottom !important;
        background-repeat: no-repeat !important;
      }

      #u_row_4 .v-row-background-image--outer {
        background-position: right bottom !important;
        background-repeat: no-repeat !important;
      }

      #u_row_4.v-row-background-image--outer {
        background-position: right bottom !important;
        background-repeat: no-repeat !important;
      }

      #u_column_4 .v-col-background-color {
        background-color: #ffffff !important;
      }

      #u_content_text_8 .v-container-padding-padding {
        padding: 10px 10px 30px !important;
      }
    }

    .box{
      margin: 20px;
      background-color: white;
    }

    .container{
      width:100%;
      height:100%;
      background-color:#F8F6F4;
      display:flex;
      justify-content:center;
      align-items:center;
    }
  </style>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet" type="text/css">
</head>

<body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #313030;color: #000000">

  <div class="u-row-container v-row-background-image--outer" style="padding: 0px;background-color: transparent">
    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
      <div class="v-row-background-image--inner" style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">

          <div class="container">
            <div class="box">
              <div style="padding: 20px; height: 100% !important; weight: 100% !important;">
                Dear User,
              </div>
              <div style="padding: 20px; height: 100% !important; weight: 100% !important;">
                One of the products that you have subscribed to is recently updated. Please check the product by clicking the link below.
              </div>
              <div style="padding: 20px; height: 100% !important; weight: 100% !important;">
                <a href="{{ route('verification.notice') }}">{{ route('verification.notice') }}</a>
              </div>
              <div style="padding: 20px; height: 100% !important; weight: 100% !important;">
                Thank you.
              </div>
            </div>
          </div>

          <div class="v-col-background-color" style="background-color: #2B3467;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
            <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
              <table id="u_content_text_8" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                <tbody>
                  <tr>
                    <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:40px 60px 40px;" align="left">
                      <div style="font-size: 13px; color: #ffffff; line-height: 170%; text-align: center; word-wrap: break-word;">
                        <p style="line-height: 170%;">You recieved this email because you signed up for {{ config('app.name') }}</p>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
