
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping";

$conn = mysqli_connect($servername , $username , $password,  $dbname);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["product_name"]. " -Price:" . $row["product_price"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

//  if(isset($_GET['id'])){
//  		$id = $_GET['id'];
//  		$sql = "SELECT * FROM product WHERE id='$id'";
//  		$result = mysqli_query($conn, $sql);
//  		$row = mysqli_fetch_array($result);
// 		 $pid = $row['id'];
//  		$pname = $row['product_name'];
//  		$pprice = $row['product_price'];
//  		$del_charge = 50;
//  		$total_price = $pprice + $del_charge;
//  		$pimage =  $row['product_image'];
//  }else{
//  	echo 'No product found!';
//  }

?>



<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hridesh</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Remember to include jQuery :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    </script>
    <style>
        .box {
            width: 800px;
            margin: 0 auto;
        }

        .active_tab1 {
            background-color: #fff;
            color: #333;
            font-weight: 600;
        }

        .inactive_tab1 {
            background-color: #f5f5f5;
            color: #333;
            cursor: not-allowed;
        }

        .has-error {
            border-color: #cc0000;
            background-color: #ffff99;
        }

        .input_color {
            border: 1px solid #fdc719;
            border-radius: 55px;
        }

        .label_color {
            font-weight: 400;
            color: #a67616;
        }

        .form-group {
            margin-bottom: 5px !important;
            display: inline-block !important;
            width: 100% !important;
        }

        #advancedDetails {
            text-align: center;
            clear: both;
            color: #ff6238;
        }


        .hidepart {
            display: none;
        }

        .showpart {
            display: block;
        }

        .model_footer {
            margin: 0;
            border-top-color: #dbdbdb;
            padding: 6px 20px 0 !important;
            background-color: antiquewhite;
        }

        .modalFooterLeft {
            text-align: left;
            width: 58.33333333%;
        }

        .modalFooterRight {
            width: 41.66666667%;
        }

        .totalPrice {
            font-size: 25px;
        }

        .totalPrice span {
            color: #f63;
        }

        .btnBack {
            color: #ee3d1b;
            text-decoration: none;
            background: 0 0;
            margin-bottom: 7px;
        }

        .btNext {
            background: #ff6238;
            color: #fff;
            border: none;
            margin-bottom: 7px !important;
        }

        .nav li a {
            padding: 10px 65px;
        }
    </style>
</head>

<body>


    <!-- By default link takes user to /login.html -->


    <!-- Login modal embedded in page -->
    <!-- <div id="login-modal" class="modal">
  ...Hridesh
</div> -->

    <br />
    <div class="container box">
    <a href="" data-modal="#register_form"></a>
        <br />
        <form method="post" id="register_form" class="">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">1 - Birth Details
                        Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">2 - Customize
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">3 - Confirm
                        Details</a>
                </li>
            </ul>
            <div class="tab-content" style="margin-top:16px;">
                <div class="tab-pane active" id="login_details">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="inputEmail3"
                                    class="col-sm-3 col-sm-offset-1 control-label label_color">Name</label>
                                <div class="col-sm-6">
                                    <input name="name" type="text" id="name" class="form-control input_color"
                                        placeholder="Name"><span id="error_name" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3"
                                    class="col-sm-3 col-sm-offset-1 control-label label_color">Gender</label>
                                <div class="col-sm-6 btn-group genderControl " data-toggle="buttons">
                                    <label class="btn btn-primary active"><img class=" ls-is-cached lazyloaded"
                                            data-src="https://static0.futurepoint.in/futurepointindia/images/male-icon.png"
                                            src="https://static0.futurepoint.in/futurepointindia/images/male-icon.png">
                                        <input id="male" type="radio"
                                            name="ctl00$ContentPlaceHolder1$Gender" value="rdoMale"
                                            checked="checked" name="male">Male</label>
                                    <label class="btn btn-primary"><img class=" ls-is-cached lazyloaded"
                                            data-src="https://static0.futurepoint.in/futurepointindia/images/female-icon.png"
                                            src="https://static0.futurepoint.in/futurepointindia/images/female-icon.png">
                                        <input id="female" type="radio"
                                            name="female" value="rdoFemale">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3"
                                    class="col-sm-3 col-sm-offset-1 control-label label_color">Country</label>
                                <div class="col-sm-6">
                                    <select name="" id="" class="form-control input_color" onchange="changecountry()">
                                        <option value="Select Country">Select Country</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option selected="selected" value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3"
                                    class="col-sm-3 col-sm-offset-1 control-label label_color">Place of Birth</label>
                                <div class="col-sm-6">
                                    <input name="" type="text" id="" class="form-control pac-target-input input_color"
                                        onchange="fillInAddress()" placeholder="Place of Birth" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 col-sm-offset-1 control-label label_color">Date
                                    of Birth</label>
                                <div class="col-sm-6">
                                    <input name="" type="text" id="" class="form-control hasDatepicker input_color"
                                        placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3"
                                    class="col-sm-3 col-sm-offset-1 control-label label_color">Prediction Year</label>
                                <div class="col-sm-6">
                                    <select name="" id="" class="form-control input_color">
                                        <option selected="selected" value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>

                                    </select>
                                    <span>Yearly Prediction will starts from this year.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 col-sm-offset-1 control-label label_color">Time
                                    of Birth</label>
                                <div class="col-sm-2">
                                    <select name="" id="" class="form-control input_color">
                                        <option value="">--Hour--</option>
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>

                                    </select>

                                </div>
                                <div class="col-sm-2">
                                    <select name="ctl00$ContentPlaceHolder1$ddlMinute"
                                        id="ctl00_ContentPlaceHolder1_ddlMinute" class="form-control">
                                        <option value="">--Minute--</option>
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="52">52</option>
                                        <option value="53">53</option>
                                        <option value="54">54</option>
                                        <option value="55">55</option>
                                        <option value="56">56</option>
                                        <option value="57">57</option>
                                        <option value="58">58</option>
                                        <option value="59">59</option>

                                    </select>


                                </div>
                            </div>

                            <div id="advanceBox" class="hidepart">
                                <div class="form-group">
                                    <label for="inputEmail3"
                                        class="col-sm-3 col-sm-offset-1 control-label label_color">State</label>
                                    <div class="col-sm-6">
                                        <input name="ctl00$ContentPlaceHolder1$txtState" type="text"
                                            id="ctl00_ContentPlaceHolder1_txtState" class="input_color form-control"
                                            placeholder="State">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3"
                                        class="col-sm-3 col-sm-offset-1 control-label label_color">District</label>
                                    <div class="col-sm-6">
                                        <input name="ctl00$ContentPlaceHolder1$txtDistrict" type="text"
                                            id="ctl00_ContentPlaceHolder1_txtDistrict" class="input_color form-control"
                                            placeholder="District">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3"
                                        class="col-sm-3 col-sm-offset-1 control-label label_color">Longitude</label>
                                    <div class="col-sm-6">

                                        <select name="" id="" class="input_color">
                                            <option value=""></option>
                                            <option value="000">000</option>
                                            <option value="001">001</option>
                                            <option value="002">002</option>
                                            <option value="003">003</option>
                                            <option value="004">004</option>
                                            <option value="005">005</option>
                                            <option value="006">006</option>
                                            <option value="007">007</option>
                                            <option value="008">008</option>
                                            <option value="009">009</option>
                                            <option value="010">010</option>
                                            <option value="011">011</option>
                                            <option value="012">012</option>
                                            <option value="013">013</option>
                                            <option value="014">014</option>
                                            <option value="015">015</option>
                                            <option value="016">016</option>
                                            <option value="017">017</option>
                                            <option value="018">018</option>
                                            <option value="019">019</option>
                                            <option value="020">020</option>
                                            <option value="021">021</option>
                                            <option value="022">022</option>
                                            <option value="023">023</option>
                                            <option value="024">024</option>
                                            <option value="025">025</option>
                                            <option value="026">026</option>
                                            <option value="027">027</option>
                                            <option value="028">028</option>
                                            <option value="029">029</option>
                                            <option value="030">030</option>
                                            <option value="031">031</option>
                                            <option value="032">032</option>
                                            <option value="033">033</option>
                                            <option value="034">034</option>
                                            <option value="035">035</option>
                                            <option value="036">036</option>
                                            <option value="037">037</option>
                                            <option value="038">038</option>
                                            <option value="039">039</option>
                                            <option value="040">040</option>
                                            <option value="041">041</option>
                                            <option value="042">042</option>
                                            <option value="043">043</option>
                                            <option value="044">044</option>
                                            <option value="045">045</option>
                                            <option value="046">046</option>
                                            <option value="047">047</option>
                                            <option value="048">048</option>
                                            <option value="049">049</option>
                                            <option value="050">050</option>
                                            <option value="051">051</option>
                                            <option value="052">052</option>
                                            <option value="053">053</option>
                                            <option value="054">054</option>
                                            <option value="055">055</option>
                                            <option value="056">056</option>
                                            <option value="057">057</option>
                                            <option value="058">058</option>
                                            <option value="059">059</option>
                                            <option value="060">060</option>
                                            <option value="061">061</option>
                                            <option value="062">062</option>
                                            <option value="063">063</option>
                                            <option value="064">064</option>
                                            <option value="065">065</option>
                                            <option value="066">066</option>
                                            <option value="067">067</option>
                                            <option value="068">068</option>
                                            <option value="069">069</option>
                                            <option value="070">070</option>
                                            <option value="071">071</option>
                                            <option value="072">072</option>
                                            <option value="073">073</option>
                                            <option value="074">074</option>
                                            <option value="075">075</option>
                                            <option value="076">076</option>
                                            <option value="077">077</option>
                                            <option value="078">078</option>
                                            <option value="079">079</option>
                                            <option value="080">080</option>
                                            <option value="081">081</option>
                                            <option value="082">082</option>
                                            <option value="083">083</option>
                                            <option value="084">084</option>
                                            <option value="085">085</option>
                                            <option value="086">086</option>
                                            <option value="087">087</option>
                                            <option value="088">088</option>
                                            <option value="089">089</option>
                                            <option value="090">090</option>
                                            <option value="091">091</option>
                                            <option value="092">092</option>
                                            <option value="093">093</option>
                                            <option value="094">094</option>
                                            <option value="095">095</option>
                                            <option value="096">096</option>
                                            <option value="097">097</option>
                                            <option value="098">098</option>
                                            <option value="099">099</option>
                                            <option value="100">100</option>
                                            <option value="101">101</option>
                                            <option value="102">102</option>
                                            <option value="103">103</option>
                                            <option value="104">104</option>
                                            <option value="105">105</option>
                                            <option value="106">106</option>
                                            <option value="107">107</option>
                                            <option value="108">108</option>
                                            <option value="109">109</option>
                                            <option value="110">110</option>
                                            <option value="111">111</option>
                                            <option value="112">112</option>
                                            <option value="113">113</option>
                                            <option value="114">114</option>
                                            <option value="115">115</option>
                                            <option value="116">116</option>
                                            <option value="117">117</option>
                                            <option value="118">118</option>
                                            <option value="119">119</option>
                                            <option value="120">120</option>
                                            <option value="121">121</option>
                                            <option value="122">122</option>
                                            <option value="123">123</option>
                                            <option value="124">124</option>
                                            <option value="125">125</option>
                                            <option value="126">126</option>
                                            <option value="127">127</option>
                                            <option value="128">128</option>
                                            <option value="129">129</option>
                                            <option value="130">130</option>
                                            <option value="131">131</option>
                                            <option value="132">132</option>
                                            <option value="133">133</option>
                                            <option value="134">134</option>
                                            <option value="135">135</option>
                                            <option value="136">136</option>
                                            <option value="137">137</option>
                                            <option value="138">138</option>
                                            <option value="139">139</option>
                                            <option value="140">140</option>
                                            <option value="141">141</option>
                                            <option value="142">142</option>
                                            <option value="143">143</option>
                                            <option value="144">144</option>
                                            <option value="145">145</option>
                                            <option value="146">146</option>
                                            <option value="147">147</option>
                                            <option value="148">148</option>
                                            <option value="149">149</option>
                                            <option value="150">150</option>
                                            <option value="151">151</option>
                                            <option value="152">152</option>
                                            <option value="153">153</option>
                                            <option value="154">154</option>
                                            <option value="155">155</option>
                                            <option value="156">156</option>
                                            <option value="157">157</option>
                                            <option value="158">158</option>
                                            <option value="159">159</option>
                                            <option value="160">160</option>
                                            <option value="161">161</option>
                                            <option value="162">162</option>
                                            <option value="163">163</option>
                                            <option value="164">164</option>
                                            <option value="165">165</option>
                                            <option value="166">166</option>
                                            <option value="167">167</option>
                                            <option value="168">168</option>
                                            <option value="169">169</option>
                                            <option value="170">170</option>
                                            <option value="171">171</option>
                                            <option value="172">172</option>
                                            <option value="173">173</option>
                                            <option value="174">174</option>
                                            <option value="175">175</option>
                                            <option value="176">176</option>
                                            <option value="177">177</option>
                                            <option value="178">178</option>
                                            <option value="179">179</option>

                                        </select>
                                        <select name="" id="" class="input_color">
                                            <option value=""></option>
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>

                                        </select>
                                        <select name="" id="" class="input_color">
                                            <option value=""></option>
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>

                                        </select>
                                        <select name="" id="" class="input_color">
                                            <option value=""></option>
                                            <option value="E">E</option>
                                            <option value="W">W</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3"
                                        class="col-sm-3 col-sm-offset-1 control-label label_color">Latitude</label>
                                    <div class="col-sm-6">

                                        <select name="" id="" class="input_color">
                                            <option value=""></option>
                                            <option value="000">000</option>
                                            <option value="001">001</option>
                                            <option value="002">002</option>
                                            <option value="003">003</option>
                                            <option value="004">004</option>
                                            <option value="005">005</option>
                                            <option value="006">006</option>
                                            <option value="007">007</option>
                                            <option value="008">008</option>
                                            <option value="009">009</option>
                                            <option value="010">010</option>
                                            <option value="011">011</option>
                                            <option value="012">012</option>
                                            <option value="013">013</option>
                                            <option value="014">014</option>
                                            <option value="015">015</option>
                                            <option value="016">016</option>
                                            <option value="017">017</option>
                                            <option value="018">018</option>
                                            <option value="019">019</option>
                                            <option value="020">020</option>
                                            <option value="021">021</option>
                                            <option value="022">022</option>
                                            <option value="023">023</option>
                                            <option value="024">024</option>
                                            <option value="025">025</option>
                                            <option value="026">026</option>
                                            <option value="027">027</option>
                                            <option value="028">028</option>
                                            <option value="029">029</option>
                                            <option value="030">030</option>
                                            <option value="031">031</option>
                                            <option value="032">032</option>
                                            <option value="033">033</option>
                                            <option value="034">034</option>
                                            <option value="035">035</option>
                                            <option value="036">036</option>
                                            <option value="037">037</option>
                                            <option value="038">038</option>
                                            <option value="039">039</option>
                                            <option value="040">040</option>
                                            <option value="041">041</option>
                                            <option value="042">042</option>
                                            <option value="043">043</option>
                                            <option value="044">044</option>
                                            <option value="045">045</option>
                                            <option value="046">046</option>
                                            <option value="047">047</option>
                                            <option value="048">048</option>
                                            <option value="049">049</option>
                                            <option value="050">050</option>
                                            <option value="051">051</option>
                                            <option value="052">052</option>
                                            <option value="053">053</option>
                                            <option value="054">054</option>
                                            <option value="055">055</option>
                                            <option value="056">056</option>
                                            <option value="057">057</option>
                                            <option value="058">058</option>
                                            <option value="059">059</option>
                                            <option value="060">060</option>
                                            <option value="061">061</option>
                                            <option value="062">062</option>
                                            <option value="063">063</option>
                                            <option value="064">064</option>
                                            <option value="065">065</option>
                                            <option value="066">066</option>
                                            <option value="067">067</option>
                                            <option value="068">068</option>
                                            <option value="069">069</option>
                                            <option value="070">070</option>
                                            <option value="071">071</option>
                                            <option value="072">072</option>
                                            <option value="073">073</option>
                                            <option value="074">074</option>
                                            <option value="075">075</option>
                                            <option value="076">076</option>
                                            <option value="077">077</option>
                                            <option value="078">078</option>
                                            <option value="079">079</option>
                                            <option value="080">080</option>
                                            <option value="081">081</option>
                                            <option value="082">082</option>
                                            <option value="083">083</option>
                                            <option value="084">084</option>
                                            <option value="085">085</option>
                                            <option value="086">086</option>
                                            <option value="087">087</option>
                                            <option value="088">088</option>
                                            <option value="089">089</option>
                                            <option value="090">090</option>
                                            <option value="091">091</option>
                                            <option value="092">092</option>
                                            <option value="093">093</option>
                                            <option value="094">094</option>
                                            <option value="095">095</option>
                                            <option value="096">096</option>
                                            <option value="097">097</option>
                                            <option value="098">098</option>
                                            <option value="099">099</option>
                                            <option value="100">100</option>
                                            <option value="101">101</option>
                                            <option value="102">102</option>
                                            <option value="103">103</option>
                                            <option value="104">104</option>
                                            <option value="105">105</option>
                                            <option value="106">106</option>
                                            <option value="107">107</option>
                                            <option value="108">108</option>
                                            <option value="109">109</option>
                                            <option value="110">110</option>
                                            <option value="111">111</option>
                                            <option value="112">112</option>
                                            <option value="113">113</option>
                                            <option value="114">114</option>
                                            <option value="115">115</option>
                                            <option value="116">116</option>
                                            <option value="117">117</option>
                                            <option value="118">118</option>
                                            <option value="119">119</option>
                                            <option value="120">120</option>
                                            <option value="121">121</option>
                                            <option value="122">122</option>
                                            <option value="123">123</option>
                                            <option value="124">124</option>
                                            <option value="125">125</option>
                                            <option value="126">126</option>
                                            <option value="127">127</option>
                                            <option value="128">128</option>
                                            <option value="129">129</option>
                                            <option value="130">130</option>
                                            <option value="131">131</option>
                                            <option value="132">132</option>
                                            <option value="133">133</option>
                                            <option value="134">134</option>
                                            <option value="135">135</option>
                                            <option value="136">136</option>
                                            <option value="137">137</option>
                                            <option value="138">138</option>
                                            <option value="139">139</option>
                                            <option value="140">140</option>
                                            <option value="141">141</option>
                                            <option value="142">142</option>
                                            <option value="143">143</option>
                                            <option value="144">144</option>
                                            <option value="145">145</option>
                                            <option value="146">146</option>
                                            <option value="147">147</option>
                                            <option value="148">148</option>
                                            <option value="149">149</option>
                                            <option value="150">150</option>
                                            <option value="151">151</option>
                                            <option value="152">152</option>
                                            <option value="153">153</option>
                                            <option value="154">154</option>
                                            <option value="155">155</option>
                                            <option value="156">156</option>
                                            <option value="157">157</option>
                                            <option value="158">158</option>
                                            <option value="159">159</option>
                                            <option value="160">160</option>
                                            <option value="161">161</option>
                                            <option value="162">162</option>
                                            <option value="163">163</option>
                                            <option value="164">164</option>
                                            <option value="165">165</option>
                                            <option value="166">166</option>
                                            <option value="167">167</option>
                                            <option value="168">168</option>
                                            <option value="169">169</option>
                                            <option value="170">170</option>
                                            <option value="171">171</option>
                                            <option value="172">172</option>
                                            <option value="173">173</option>
                                            <option value="174">174</option>
                                            <option value="175">175</option>
                                            <option value="176">176</option>
                                            <option value="177">177</option>
                                            <option value="178">178</option>
                                            <option value="179">179</option>

                                        </select>
                                        <select name="" id="" class="input_color">
                                            <option value=""></option>
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>

                                        </select>
                                        <select name="" id="" class="input_color">
                                            <option value=""></option>
                                            <option value="00">00</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>

                                        </select>
                                        <select name="" id="" class="input_color">
                                            <option value=""></option>
                                            <option value="N">N</option>
                                            <option value="S">S</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3"
                                        class="col-sm-3 col-sm-offset-1 control-label label_color">Zone</label>
                                    <div class="col-sm-6">
                                        <select name="" id="" class="input_color">
                                            <option value=""></option>
                                            <option value="-00.00">UTC -00.00</option>
                                            <option value="+00.00">UTC +00.00</option>
                                            <option value="+01.00">UTC +01.00</option>
                                            <option value="+02.00">UTC +02.00</option>
                                            <option value="+03.00">UTC +03.00</option>
                                            <option value="+03.30">UTC +03.30</option>
                                            <option value="+01.00">UTC +01.00</option>
                                            <option value="+04.00">UTC +04.00</option>
                                            <option value="+04.30">UTC +04.30</option>
                                            <option value="+05.00">UTC +05.00</option>
                                            <option value="+05.30">UTC +05.30</option>
                                            <option value="+05.45">UTC +05.45</option>
                                            <option value="+06.00">UTC +06.00</option>
                                            <option value="+06.30">UTC +06.30</option>
                                            <option value="+07.00">UTC +07.00</option>
                                            <option value="+08.00">UTC +08.00</option>
                                            <option value="+09.00">UTC +09.00</option>
                                            <option value="+09.30">UTC +09.30</option>
                                            <option value="+10.00">UTC +10.00</option>
                                            <option value="+11.00">UTC +11.00</option>
                                            <option value="+12.00">UTC +12.00</option>
                                            <option value="+13.00">UTC +13.00</option>
                                            <option value="-01.00">UTC -01.00</option>
                                            <option value="-02.00">UTC -02.00</option>
                                            <option value="-03.00">UTC -03.00</option>
                                            <option value="-03.30">UTC -03.30</option>
                                            <option value="-01.00">UTC -01.00</option>
                                            <option value="-04.00">UTC -04.00</option>
                                            <option value="-04.30">UTC -04.30</option>
                                            <option value="-05.00">UTC -05.00</option>
                                            <option value="-05.30">UTC -05.30</option>
                                            <option value="-06.00">UTC -06.00</option>
                                            <option value="-06.30">UTC -06.30</option>
                                            <option value="-07.00">UTC -07.00</option>
                                            <option value="-08.00">UTC -08.00</option>
                                            <option value="-09.00">UTC -09.00</option>
                                            <option value="-09.30">UTC -09.30</option>
                                            <option value="-10.00">UTC -10.00</option>
                                            <option value="-11.00">UTC -11.00</option>
                                            <option value="-12.00">UTC -12.00</option>
                                            <option value="-13.00">UTC -13.00</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3"
                                        class="col-sm-3 col-sm-offset-1 control-label label_color">Time
                                        Correction</label>
                                    <div class="col-sm-6">
                                        <select class="form-control input_color">
                                            <option value="S">Standard Time</option>
                                            <option value="L">Local Time</option>
                                            <option value="W">War Time</option>
                                            <option value="D">Day Light Saving Time</option>
                                            <option value="H">Half Day Light Saving Time</option>
                                            <option value="T">Double Day Light Saving Time</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="advancedDetails" class="showmore">Show advance details</div>

                            <!-- <div class="form-group">
                                <label>Enter Email Address</label>
                                <input type="text" name="email" id="email" class="form-control" />
                                <span id="error_email" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" name="password" id="password" class="form-control" />
                                <span id="error_password" class="text-danger"></span>
                            </div> -->
                            <br />
                            <div class="modal-footer model_footer">
                                <div class="row">
                                    <div class="col-xs-7 col-md-7 col-md-8 col-lg-9 modalFooterLeft">
                                        <div class="totalPrice">Total :
                                            <span><i></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-md-5 col-md-4 col-lg-3 modalFooterRight">
                                        <button type="button" name="btn_birth_details" id="btn_birth_details" class="btn btn-info btn-lg btNext">Next</button>
                                    </div>
                                </div>
                            </div>


                            <br />
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="personal_details">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="container" style="width:100%; padding:0%">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <h4>Language<br><small>Select langauge</small></h4>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="container-fluid">
                                                <select name="" id="" class="form-control">
                                                    <option value="English">English</option>
                                                    <option value="Hindi">Hindi</option>
                                                </select>
                                                <input type="hidden" value="" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <h4>Chart Type <br><small>Select chart type</small></h4>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="btn-group chartControl" data-toggle="buttons">
                                            <label for="" class="btn active">
                                                <li class="northChart"></li>
                                                <input type="radio" id="" name="" checked="checked" value="rdoNorthIndian">
                                                <label for="">North</label>
                                            </label>
                                            <label for="" class="btn">
                                                <li class="southChart"></li>
                                                <input type="radio" id="" name="" checked="checked" value="rdoSouthIndian">
                                                <label for="">South</label>
                                            </label>
                                            <label for="" class="btn">
                                                <li class="bengaliChart"></li>
                                                <input type="radio" id="" name="" checked="checked" value="rdoBengaliIndian">
                                                <label for="">Bengali</label>
                                            </label>
                                            <label for="" class="btn">
                                                <li class="westernChart"></li>
                                                <input type="radio" id="" name="" checked="checked" value="rdoWesternIndian">
                                                <label for="">Western</label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <h4>Hard Copy <br><small>Get your horoscope in our most innovative popular black and white paperback format</small></h4>
                                    <div class="hardCopySample">
                                        <div class="hardCopySampleIn" style="display: inline-block; width: 45%; margin: 10px 5px;">
                                            <p style="font-size: 12px;color: #f60; text-align: center;">B & W Paperback</p>
                                            <a href="#"><img style="width: 50px; height: 68px;" src="include/img/2.jpg" alt="" srcset=""></a>
                                            <a href="#"><img style="width: 50px; height: 68px;" src="include/img/3.jpg" alt="" srcset=""></a>
                                            <a href="#"><img style="width: 50px; height: 68px;" src="include/img/4.jpg" alt="" srcset=""></a>
                                        </div>
                                        <div class="hardCopySampleIn" style="display: inline-block; width: 45%; margin: 10px 5px;">
                                            <p style="font-size: 12px;color: #f60; text-align: center;">Colored Book</p>
                                            <a href="#"><img style="width: 50px; height: 68px;" src="include/img/5.jpg" alt="" srcset=""></a>
                                            <a href="#"><img style="width: 50px; height: 68px;" src="include/img/6.jpg" alt="" srcset=""></a>
                                            <a href="#"><img style="width: 50px; height: 68px;" src="include/img/7.jpg" alt="" srcset=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="radio">
                                        <label for="">
                                            <span onchange="SetPrice();OptionsEventTrack();">
                                                <input type="radio" id="" name="" value="rdbNormal" data-gtm-form-interact-field-id="5">
                                            </span>Black & White Paperback + Free Softcopy
                                            <b>
                                                <i class="fa fa-inr"></i>
                                            </b>
                                        </label>
                                    </div>
                                    <div id="" class="radio">
                                        <label for="">
                                            <span onchange="SetPrice();OptionsEventTrack();">
                                                <input type="radio" name="" id="" value="rdbSoftCopy" checked="checked" data-gtm-form-interact-field-id="6">
                                            </span>Softcopy<b><i class="fa fa-inr"></i></b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <h4>Add Consultation <br><small>Consult from our most renowned astrologer.</small></h4>
                                    <p class="noteRed">* Enter your query & select astrologer</p>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group inputLabel">
                                        <div class="container-fluid">
                                            <label for=""><span onchange="SetPrice();"><input type="checkbox" data-gtm-form-interact-field-id="4"></span> Yes, I want Consultation </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <h4>Consultation Type <br><span class="noteRed">*After making your payment, Contact: 011-40541026, +91-8810625600
                                            for Telephonic Consultancy.</span></h4>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="container-fluid">
                                            <label for="" class="radio-inline"><span disabled="disabled"><input type="radio" value="rdoEmail" checked="checked" onclick="OnClickEnabled();" disabled="disabled"><label for="">Email</label></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <div class="container-fluid">
                                            <textarea class="form-control" name="" id="" rows="3" placeholder="Enter Question" onkeyup="CheckTextLength(this,900)" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- <div class="form-group">
                                <label>Enter First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" />
                                <span id="error_first_name" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" />
                                <span id="error_last_name" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="male" checked> Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="female"> Female
                                </label>
                            </div> -->
                        <br />
                        <div class="modal-footer model_footer">
                            <div class="row">
                                <div class="col-xs-7 col-md-7 col-md-8 col-lg-9 modalFooterLeft">
                                    <div class="totalPrice">Total :
                                        <span><i></i></span>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 col-md-4 col-lg-3 modalFooterRight">
                                    <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg btnBack">Back</button>
                                    <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg btNext">Next</button>
                                </div>
                            </div>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact_details">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <h2>Date of Birth </h2>
                                            <a href="#" id="" class="pull-right">Edit Details</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-5 col-sm-5 col-md-5 alignRight">Name: </div>
                                        <div class="col-xs-6 col-xs-offset-1 col-sm-6 col-sm-offset-1 col-md-6 col-md-offset-1 message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                                <label>Enter Address</label>
                                <textarea name="address" id="address" class="form-control"></textarea>
                                <span id="error_address" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Mobile No.</label>
                                <input type="text" name="mobile_no" id="mobile_no" class="form-control" />
                                <span id="error_mobile_no" class="text-danger"></span>
                            </div> -->
                        <br />
                        <!-- <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg btnBack">Back</button>
                                <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg btNext">Next</button>                             -->
                        <div class="modal-footer model_footer">
                            <div class="row">
                                <div class="col-xs-7 col-md-7 col-md-8 col-lg-9 modalFooterLeft">
                                    <div class="totalPrice">Total :
                                        <span><i></i></span>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 col-md-4 col-lg-3 modalFooterRight">
                                    <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg btnBack">Back</button>
                                    <button type="button" name="btn_pay_details" id="btn_pay_details" class="btn btn-success btn-lg btNext">Pay</button>
                                </div>
                            </div>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
    
    </form>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $(function() {
            $('a[data-modal]').on('click', function() {
                $($(this).data('modal')).modal({
                    fadeDuration: 250
                });
                return false;
            });
        });


        $(".btnnext").click(function() {
            var name = $("#name").val();
            // var gender_name = $("#male").val();

            // $('.message').html(txt);
            // $('.message').html(gender_name);
            // alert(txt);       
        });

        $('#btn_birth_details').click(function() {

            var error_name = '';
            // var error_email = '';
            // var error_password = '';
            // var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if ($.trim($('#name').val()).length == 0) {
                error_name = 'Name is required';
                $('#error_name').text(error_name);
                $('#name').addClass('has-error');
            }


            // if ($.trim($('#email').val()).length == 0) {
            //     error_email = 'Email is required';
            //     $('#error_email').text(error_email);
            //     $('#email').addClass('has-error');
            //  } 
            // else {
            //     if (!filter.test($('#email').val())) {
            //         error_email = 'Invalid Email';
            //         $('#error_email').text(error_email);
            //         $('#email').addClass('has-error');
            //     } else {
            //         error_email = '';
            //         $('#error_email').text(error_email);
            //         $('#email').removeClass('has-error');
            //     }
            // }

            // if ($.trim($('#password').val()).length == 0) {
            //     error_password = 'Password is required';
            //     $('#error_password').text(error_password);
            //     $('#password').addClass('has-error');
            // } 
            // else {
            //     error_password = '';
            //     $('#error_password').text(error_password);
            //     $('#password').removeClass('has-error');
            // }

            // if (error_email != '' || error_password != '' || error_name != '') {
            if (error_name != '') {
                return false;
            } else {
                $('#list_login_details').removeClass('active active_tab1');
                $('#list_login_details').removeAttr('href data-toggle');
                $('#login_details').removeClass('active');
                $('#list_login_details').addClass('inactive_tab1');
                $('#list_personal_details').removeClass('inactive_tab1');
                $('#list_personal_details').addClass('active_tab1 active');
                $('#list_personal_details').attr('href', '#personal_details');
                $('#list_personal_details').attr('data-toggle', 'tab');
                $('#personal_details').addClass('active in');
            }
        });

        $('#previous_btn_personal_details').click(function() {
            $('#list_personal_details').removeClass('active active_tab1');
            $('#list_personal_details').removeAttr('href data-toggle');
            $('#personal_details').removeClass('active in');
            $('#list_personal_details').addClass('inactive_tab1');
            $('#list_login_details').removeClass('inactive_tab1');
            $('#list_login_details').addClass('active_tab1 active');
            $('#list_login_details').attr('href', '#login_details');
            $('#list_login_details').attr('data-toggle', 'tab');
            $('#login_details').addClass('active in');
        });

        $('#btn_personal_details').click(function() {
            // var error_first_name = '';
            // var error_last_name = '';

            // if ($.trim($('#first_name').val()).length == 0) {
            //     error_first_name = 'First Name is required';
            //     $('#error_first_name').text(error_first_name);
            //     $('#first_name').addClass('has-error');
            // } else {
            //     error_first_name = '';
            //     $('#error_first_name').text(error_first_name);
            //     $('#first_name').removeClass('has-error');
            // }

            // if ($.trim($('#last_name').val()).length == 0) {
            //     error_last_name = 'Last Name is required';
            //     $('#error_last_name').text(error_last_name);
            //     $('#last_name').addClass('has-error');
            // } else {
            //     error_last_name = '';
            //     $('#error_last_name').text(error_last_name);
            //     $('#last_name').removeClass('has-error');
            // }

            // if (error_first_name != '' || error_last_name != '') {
            //     return false;
            // } else {
            $('#list_personal_details').removeClass('active active_tab1');
            $('#list_personal_details').removeAttr('href data-toggle');
            $('#personal_details').removeClass('active');
            $('#list_personal_details').addClass('inactive_tab1');
            $('#list_contact_details').removeClass('inactive_tab1');
            $('#list_contact_details').addClass('active_tab1 active');
            $('#list_contact_details').attr('href', '#contact_details');
            $('#list_contact_details').attr('data-toggle', 'tab');
            $('#contact_details').addClass('active in');
            // }
        });

        $('#previous_btn_contact_details').click(function() {
            $('#list_contact_details').removeClass('active active_tab1');
            $('#list_contact_details').removeAttr('href data-toggle');
            $('#contact_details').removeClass('active in');
            $('#list_contact_details').addClass('inactive_tab1');
            $('#list_personal_details').removeClass('inactive_tab1');
            $('#list_personal_details').addClass('active_tab1 active');
            $('#list_personal_details').attr('href', '#personal_details');
            $('#list_personal_details').attr('data-toggle', 'tab');
            $('#personal_details').addClass('active in');
        });

        // $('#btn_pay_details').click(function() {
        //     var error_address = '';
        //     var error_mobile_no = '';
        //     var mobile_validation = /^\d{10}$/;
        //     if ($.trim($('#address').val()).length == 0) {
        //         error_address = 'Address is required';
        //         $('#error_address').text(error_address);
        //         $('#address').addClass('has-error');
        //     } else {
        //         error_address = '';
        //         $('#error_address').text(error_address);
        //         $('#address').removeClass('has-error');
        //     }

        //     if ($.trim($('#mobile_no').val()).length == 0) {
        //         error_mobile_no = 'Mobile Number is required';
        //         $('#error_mobile_no').text(error_mobile_no);
        //         $('#mobile_no').addClass('has-error');
        //     } else {
        //         if (!mobile_validation.test($('#mobile_no').val())) {
        //             error_mobile_no = 'Invalid Mobile Number';
        //             $('#error_mobile_no').text(error_mobile_no);
        //             $('#mobile_no').addClass('has-error');
        //         } else {
        //             error_mobile_no = '';
        //             $('#error_mobile_no').text(error_mobile_no);
        //             $('#mobile_no').removeClass('has-error');
        //         }
        //     }
        //     if (error_address != '' || error_mobile_no != '') {
        //         return false;
        //     } else {
        //         $('#btn_pay_details').attr("disabled", "disabled");
        //         $(document).css('cursor', 'prgress');
        //         $("#register_form").submit();
        //     }

        // });

        $(".showmore").click(function(event) {
            // alert('hiii');
            var txt = $(".hidepart").is(':visible') ? 'Show advance details' : 'Hide advance details';
            $(".hidepart").toggleClass("showpart");
            $(this).html(txt);
            event.preventDefault();
        });
    });
</script>