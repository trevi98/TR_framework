

<div class="form_container">
    <h2>Edit Profile</h2>
    <?php if(isset($data['success']) && $data['success'] == 'all'):?>
            <span class="success">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
    <form action="<?php echo URLROOT;?>/users/edit_profile" method="POST">
        <input type="text" name="first_name" id="" required value="<?php if(!empty($data['data'])) echo $data['data']['first_name'];?>">
        <input type="text" name="last_name" id="" required value="<?php if(!empty($data['data'])) echo $data['data']['last_name'] ;?>">
        <select name="country" value="<?php if(!empty($data['data']))echo $data['data']['country'] ;?>">
            <!-- Countries often selected by users can be moved to the top of the list. -->
            <!-- Countries known to be subject to general US embargo are commented out by default. -->
            <!-- The data-countryCode attribute is populated with ISO country code, and value is int'l calling code. -->

            <option data-countryCode="US" value="1" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1' ) echo 'selected' ;}?>>USA (+1)</option>
            <option data-countryCode="GB" value="44" <?php if(!empty($data['data'])) {if($data['data']['country'] == '44' ) echo 'selected' ;}?>>UK (+44)</option>

            <!-- <option disabled="disabled">Other Countries</option> -->
            <option data-countryCode="DZ" value="213" <?php if(!empty($data['data'])) {if($data['data']['country'] == '213' ) echo 'selected' ;}?>>Algeria (+213)</option>
            <option data-countryCode="AD" value="376" <?php if(!empty($data['data'])) {if($data['data']['country'] == '376' ) echo 'selected' ;}?>>Andorra (+376)</option>
            <option data-countryCode="AO" value="244" <?php if(!empty($data['data'])) {if($data['data']['country'] == '244' ) echo 'selected' ;}?>>Angola (+244)</option>
            <option data-countryCode="AI" value="1264" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1264' ) echo 'selected' ;}?>>Anguilla (+1264)</option>
            <option data-countryCode="AG" value="1268" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1268' ) echo 'selected' ;}?>>Antigua &amp; Barbuda (+1268)</option>
            <option data-countryCode="AR" value="54" <?php if(!empty($data['data'])) {if($data['data']['country'] == '54' ) echo 'selected' ;}?>>Argentina (+54)</option>
            <option data-countryCode="AM" value="374" <?php if(!empty($data['data'])) {if($data['data']['country'] == '374' ) echo 'selected' ;}?>>Armenia (+374)</option>
            <option data-countryCode="AW" value="297" <?php if(!empty($data['data'])) {if($data['data']['country'] == '297' ) echo 'selected' ;}?>>Aruba (+297)</option>
            <option data-countryCode="AU" value="61" <?php if(!empty($data['data'])) {if($data['data']['country'] == '61' ) echo 'selected' ;}?>>Australia (+61)</option>
            <option data-countryCode="AT" value="43" <?php if(!empty($data['data'])) {if($data['data']['country'] == '43' ) echo 'selected' ;}?>>Austria (+43)</option>
            <option data-countryCode="AZ" value="994" <?php if(!empty($data['data'])) {if($data['data']['country'] == '994' ) echo 'selected' ;}?>>Azerbaijan (+994)</option>
            <option data-countryCode="BS" value="1242" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1242' ) echo 'selected' ;}?>>Bahamas (+1242)</option>
            <option data-countryCode="BH" value="973" <?php if(!empty($data['data'])) {if($data['data']['country'] == '973' ) echo 'selected' ;}?>>Bahrain (+973)</option>
            <option data-countryCode="BD" value="880" <?php if(!empty($data['data'])) {if($data['data']['country'] == '880' ) echo 'selected' ;}?>>Bangladesh (+880)</option>
            <option data-countryCode="BB" value="1246" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1246' ) echo 'selected' ;}?>>Barbados (+1246)</option>
            <option data-countryCode="BY" value="375" <?php if(!empty($data['data'])) {if($data['data']['country'] == '375' ) echo 'selected' ;}?>>Belarus (+375)</option>
            <option data-countryCode="BE" value="32" <?php if(!empty($data['data'])) {if($data['data']['country'] == '32' ) echo 'selected' ;}?>>Belgium (+32)</option>
            <option data-countryCode="BZ" value="501" <?php if(!empty($data['data'])) {if($data['data']['country'] == '501' ) echo 'selected' ;}?>>Belize (+501)</option>
            <option data-countryCode="BJ" value="229" <?php if(!empty($data['data'])) {if($data['data']['country'] == '229' ) echo 'selected' ;}?>>Benin (+229)</option>
            <option data-countryCode="BM" value="1441" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1441' ) echo 'selected' ;}?>>Bermuda (+1441)</option>
            <option data-countryCode="BT" value="975" <?php if(!empty($data['data'])) {if($data['data']['country'] == '975' ) echo 'selected' ;}?>>Bhutan (+975)</option>
            <option data-countryCode="BO" value="591" <?php if(!empty($data['data'])) {if($data['data']['country'] == '591' ) echo 'selected' ;}?>>Bolivia (+591)</option>
            <option data-countryCode="BA" value="387" <?php if(!empty($data['data'])) {if($data['data']['country'] == '387' ) echo 'selected' ;}?>>Bosnia Herzegovina (+387)</option>
            <option data-countryCode="BW" value="267" <?php if(!empty($data['data'])) {if($data['data']['country'] == '267' ) echo 'selected' ;}?>>Botswana (+267)</option>
            <option data-countryCode="BR" value="55" <?php if(!empty($data['data'])) {if($data['data']['country'] == '55' ) echo 'selected' ;}?>>Brazil (+55)</option>
            <option data-countryCode="BN" value="673" <?php if(!empty($data['data'])) {if($data['data']['country'] == '673' ) echo 'selected' ;}?>>Brunei (+673)</option>
            <option data-countryCode="BG" value="359" <?php if(!empty($data['data'])) {if($data['data']['country'] == '359' ) echo 'selected' ;}?>>Bulgaria (+359)</option>
            <option data-countryCode="BF" value="226" <?php if(!empty($data['data'])) {if($data['data']['country'] == '226' ) echo 'selected' ;}?>>Burkina Faso (+226)</option>
            <option data-countryCode="BI" value="257" <?php if(!empty($data['data'])) {if($data['data']['country'] == '257' ) echo 'selected' ;}?>>Burundi (+257)</option>
            <option data-countryCode="KH" value="855" <?php if(!empty($data['data'])) {if($data['data']['country'] == '855' ) echo 'selected' ;}?>>Cambodia (+855)</option>
            <option data-countryCode="CM" value="237" <?php if(!empty($data['data'])) {if($data['data']['country'] == '237' ) echo 'selected' ;}?>>Cameroon (+237)</option>
            <option data-countryCode="CA" value="1" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1' ) echo 'selected' ;}?>>Canada (+1)</option>
            <option data-countryCode="CV" value="238" <?php if(!empty($data['data'])) {if($data['data']['country'] == '238' ) echo 'selected' ;}?>>Cape Verde Islands (+238)</option>
            <option data-countryCode="KY" value="1345" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1345' ) echo 'selected' ;}?>>Cayman Islands (+1345)</option>
            <option data-countryCode="CF" value="236" <?php if(!empty($data['data'])) {if($data['data']['country'] == '236' ) echo 'selected' ;}?>>Central African Republic (+236)</option>
            <option data-countryCode="CL" value="56" <?php if(!empty($data['data'])) {if($data['data']['country'] == '56' ) echo 'selected' ;}?>>Chile (+56)</option>
            <option data-countryCode="CN" value="86" <?php if(!empty($data['data'])) {if($data['data']['country'] == '86' ) echo 'selected' ;}?>>China (+86)</option>
            <option data-countryCode="CO" value="57" <?php if(!empty($data['data'])) {if($data['data']['country'] == '57' ) echo 'selected' ;}?>>Colombia (+57)</option>
            <option data-countryCode="KM" value="269" <?php if(!empty($data['data'])) {if($data['data']['country'] == '269' ) echo 'selected' ;}?>>Comoros (+269)</option>
            <option data-countryCode="CG" value="242" <?php if(!empty($data['data'])) {if($data['data']['country'] == '242' ) echo 'selected' ;}?>>Congo (+242)</option>
            <option data-countryCode="CK" value="682" <?php if(!empty($data['data'])) {if($data['data']['country'] == '682' ) echo 'selected' ;}?>>Cook Islands (+682)</option>
            <option data-countryCode="CR" value="506" <?php if(!empty($data['data'])) {if($data['data']['country'] == '506' ) echo 'selected' ;}?>>Costa Rica (+506)</option>
            <option data-countryCode="HR" value="385" <?php if(!empty($data['data'])) {if($data['data']['country'] == '385' ) echo 'selected' ;}?>>Croatia (+385)</option>
            <!-- <option data-countryCode="CU" value="5 if(!empty($data['data'])) {<?php //if($data['data']['country'] == '="' ) echo 'selected'} ;?>3">Cuba (+53)</option> -->
            <option data-countryCode="CY" value="90" <?php if(!empty($data['data'])) {if($data['data']['country'] == '90' ) echo 'selected' ;}?>>Cyprus - North (+90)</option>
            <option data-countryCode="CY" value="357" <?php if(!empty($data['data'])) {if($data['data']['country'] == '357' ) echo 'selected' ;}?>>Cyprus - South (+357)</option>
            <option data-countryCode="CZ" value="420" <?php if(!empty($data['data'])) {if($data['data']['country'] == '420' ) echo 'selected' ;}?>>Czech Republic (+420)</option>
            <option data-countryCode="DK" value="45" <?php if(!empty($data['data'])) {if($data['data']['country'] == '45' ) echo 'selected' ;}?>>Denmark (+45)</option>
            <option data-countryCode="DJ" value="253" <?php if(!empty($data['data'])) {if($data['data']['country'] == '253' ) echo 'selected' ;}?>>Djibouti (+253)</option>
            <option data-countryCode="DM" value="1809" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1809' ) echo 'selected' ;}?>>Dominica (+1809)</option>
            <option data-countryCode="DO" value="1809" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1809' ) echo 'selected' ;}?>>Dominican Republic (+1809)</option>
            <option data-countryCode="EC" value="593" <?php if(!empty($data['data'])) {if($data['data']['country'] == '593' ) echo 'selected' ;}?>>Ecuador (+593)</option>
            <option data-countryCode="EG" value="20" <?php if(!empty($data['data'])) {if($data['data']['country'] == '20' ) echo 'selected' ;}?>>Egypt (+20)</option>
            <option data-countryCode="SV" value="503" <?php if(!empty($data['data'])) {if($data['data']['country'] == '503' ) echo 'selected' ;}?>>El Salvador (+503)</option>
            <option data-countryCode="GQ" value="240" <?php if(!empty($data['data'])) {if($data['data']['country'] == '240' ) echo 'selected' ;}?>>Equatorial Guinea (+240)</option>
            <option data-countryCode="ER" value="291" <?php if(!empty($data['data'])) {if($data['data']['country'] == '291' ) echo 'selected' ;}?>>Eritrea (+291)</option>
            <option data-countryCode="EE" value="372" <?php if(!empty($data['data'])) {if($data['data']['country'] == '372' ) echo 'selected' ;}?>>Estonia (+372)</option>
            <option data-countryCode="ET" value="251" <?php if(!empty($data['data'])) {if($data['data']['country'] == '251' ) echo 'selected' ;}?>>Ethiopia (+251)</option>
            <option data-countryCode="FK" value="500" <?php if(!empty($data['data'])) {if($data['data']['country'] == '500' ) echo 'selected' ;}?>>Falkland Islands (+500)</option>
            <option data-countryCode="FO" value="298" <?php if(!empty($data['data'])) {if($data['data']['country'] == '298' ) echo 'selected' ;}?>>Faroe Islands (+298)</option>
            <option data-countryCode="FJ" value="679" <?php if(!empty($data['data'])) {if($data['data']['country'] == '679' ) echo 'selected' ;}?>>Fiji (+679)</option>
            <option data-countryCode="FI" value="358" <?php if(!empty($data['data'])) {if($data['data']['country'] == '358' ) echo 'selected' ;}?>>Finland (+358)</option>
            <option data-countryCode="FR" value="33" <?php if(!empty($data['data'])) {if($data['data']['country'] == '33' ) echo 'selected' ;}?>>France (+33)</option>
            <option data-countryCode="GF" value="594" <?php if(!empty($data['data'])) {if($data['data']['country'] == '594' ) echo 'selected' ;}?>>French Guiana (+594)</option>
            <option data-countryCode="PF" value="689" <?php if(!empty($data['data'])) {if($data['data']['country'] == '689' ) echo 'selected' ;}?>>French Polynesia (+689)</option>
            <option data-countryCode="GA" value="241" <?php if(!empty($data['data'])) {if($data['data']['country'] == '241' ) echo 'selected' ;}?>>Gabon (+241)</option>
            <option data-countryCode="GM" value="220" <?php if(!empty($data['data'])) {if($data['data']['country'] == '220' ) echo 'selected' ;}?>>Gambia (+220)</option>
            <option data-countryCode="GE" value="7880" <?php if(!empty($data['data'])) {if($data['data']['country'] == '7880' ) echo 'selected' ;}?>>Georgia (+7880)</option>
            <option data-countryCode="DE" value="49" <?php if(!empty($data['data'])) {if($data['data']['country'] == '49' ) echo 'selected' ;}?>>Germany (+49)</option>
            <option data-countryCode="GH" value="233" <?php if(!empty($data['data'])) {if($data['data']['country'] == '233' ) echo 'selected' ;}?>>Ghana (+233)</option>
            <option data-countryCode="GI" value="350" <?php if(!empty($data['data'])) {if($data['data']['country'] == '350' ) echo 'selected' ;}?>>Gibraltar (+350)</option>
            <option data-countryCode="GR" value="30" <?php if(!empty($data['data'])) {if($data['data']['country'] == '30' ) echo 'selected' ;}?>>Greece (+30)</option>
            <option data-countryCode="GL" value="299" <?php if(!empty($data['data'])) {if($data['data']['country'] == '299' ) echo 'selected' ;}?>>Greenland (+299)</option>
            <option data-countryCode="GD" value="1473" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1473' ) echo 'selected' ;}?>>Grenada (+1473)</option>
            <option data-countryCode="GP" value="590" <?php if(!empty($data['data'])) {if($data['data']['country'] == '590' ) echo 'selected' ;}?>>Guadeloupe (+590)</option>
            <option data-countryCode="GU" value="671" <?php if(!empty($data['data'])) {if($data['data']['country'] == '671' ) echo 'selected' ;}?>>Guam (+671)</option>
            <option data-countryCode="GT" value="502" <?php if(!empty($data['data'])) {if($data['data']['country'] == '502' ) echo 'selected' ;}?>>Guatemala (+502)</option>
            <option data-countryCode="GN" value="224" <?php if(!empty($data['data'])) {if($data['data']['country'] == '224' ) echo 'selected' ;}?>>Guinea (+224)</option>
            <option data-countryCode="GW" value="245" <?php if(!empty($data['data'])) {if($data['data']['country'] == '245' ) echo 'selected' ;}?>>Guinea - Bissau (+245)</option>
            <option data-countryCode="GY" value="592" <?php if(!empty($data['data'])) {if($data['data']['country'] == '592' ) echo 'selected' ;}?>>Guyana (+592)</option>
            <option data-countryCode="HT" value="509" <?php if(!empty($data['data'])) {if($data['data']['country'] == '509' ) echo 'selected' ;}?>>Haiti (+509)</option>
            <option data-countryCode="HN" value="504" <?php if(!empty($data['data'])) {if($data['data']['country'] == '504' ) echo 'selected' ;}?>>Honduras (+504)</option>
            <option data-countryCode="HK" value="852" <?php if(!empty($data['data'])) {if($data['data']['country'] == '852' ) echo 'selected' ;}?>>Hong Kong (+852)</option>
            <option data-countryCode="HU" value="36" <?php if(!empty($data['data'])) {if($data['data']['country'] == '36' ) echo 'selected' ;}?>>Hungary (+36)</option>
            <option data-countryCode="IS" value="354" <?php if(!empty($data['data'])) {if($data['data']['country'] == '354' ) echo 'selected' ;}?>>Iceland (+354)</option>
            <option data-countryCode="IN" value="91" <?php if(!empty($data['data'])) {if($data['data']['country'] == '91' ) echo 'selected' ;}?>>India (+91)</option>
            <option data-countryCode="ID" value="62" <?php if(!empty($data['data'])) {if($data['data']['country'] == '62' ) echo 'selected' ;}?>>Indonesia (+62)</option>
            <option data-countryCode="IQ" value="964" <?php if(!empty($data['data'])) {if($data['data']['country'] == '964' ) echo 'selected' ;}?>>Iraq (+964)</option>
            <!-- <option data-countryCode="IR" value="9 if(!empty($data['data'])) {<?php //if($data['data']['country'] == '="' ) echo 'selected'} ;?>8">Iran (+98)</option> -->
            <option data-countryCode="IE" value="353" <?php if(!empty($data['data'])) {if($data['data']['country'] == '353' ) echo 'selected' ;}?>>Ireland (+353)</option>
            <option data-countryCode="IL" value="972" <?php if(!empty($data['data'])) {if($data['data']['country'] == '972' ) echo 'selected' ;}?>>Israel (+972)</option>
            <option data-countryCode="IT" value="39" <?php if(!empty($data['data'])) {if($data['data']['country'] == '39' ) echo 'selected' ;}?>>Italy (+39)</option>
            <option data-countryCode="JM" value="1876" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1876' ) echo 'selected' ;}?>>Jamaica (+1876)</option>
            <option data-countryCode="JP" value="81" <?php if(!empty($data['data'])) {if($data['data']['country'] == '81' ) echo 'selected' ;}?>>Japan (+81)</option>
            <option data-countryCode="JO" value="962" <?php if(!empty($data['data'])) {if($data['data']['country'] == '962' ) echo 'selected' ;}?>>Jordan (+962)</option>
            <option data-countryCode="KZ" value="7" <?php if(!empty($data['data'])) {if($data['data']['country'] == '7' ) echo 'selected' ;}?>>Kazakhstan (+7)</option>
            <option data-countryCode="KE" value="254" <?php if(!empty($data['data'])) {if($data['data']['country'] == '254' ) echo 'selected' ;}?>>Kenya (+254)</option>
            <option data-countryCode="KI" value="686" <?php if(!empty($data['data'])) {if($data['data']['country'] == '686' ) echo 'selected' ;}?>>Kiribati (+686)</option>
            <!-- <option data-countryCode="KP" value="85 if(!empty($data['data'])) {<?php //if($data['data']['country'] == '="' ) echo 'selected'} ;?>0">Korea - North (+850)</option> -->
            <option data-countryCode="KR" value="82" <?php if(!empty($data['data'])) {if($data['data']['country'] == '82' ) echo 'selected' ;}?>>Korea - South (+82)</option>
            <option data-countryCode="KW" value="965" <?php if(!empty($data['data'])) {if($data['data']['country'] == '965' ) echo 'selected' ;}?>>Kuwait (+965)</option>
            <option data-countryCode="KG" value="996" <?php if(!empty($data['data'])) {if($data['data']['country'] == '996' ) echo 'selected' ;}?>>Kyrgyzstan (+996)</option>
            <option data-countryCode="LA" value="856" <?php if(!empty($data['data'])) {if($data['data']['country'] == '856' ) echo 'selected' ;}?>>Laos (+856)</option>
            <option data-countryCode="LV" value="371" <?php if(!empty($data['data'])) {if($data['data']['country'] == '371' ) echo 'selected' ;}?>>Latvia (+371)</option>
            <option data-countryCode="LB" value="961" <?php if(!empty($data['data'])) {if($data['data']['country'] == '961' ) echo 'selected' ;}?>>Lebanon (+961)</option>
            <option data-countryCode="LS" value="266" <?php if(!empty($data['data'])) {if($data['data']['country'] == '266' ) echo 'selected' ;}?>>Lesotho (+266)</option>
            <option data-countryCode="LR" value="231" <?php if(!empty($data['data'])) {if($data['data']['country'] == '231' ) echo 'selected' ;}?>>Liberia (+231)</option>
            <option data-countryCode="LY" value="218" <?php if(!empty($data['data'])) {if($data['data']['country'] == '218' ) echo 'selected' ;}?>>Libya (+218)</option>
            <option data-countryCode="LI" value="417" <?php if(!empty($data['data'])) {if($data['data']['country'] == '417' ) echo 'selected' ;}?>>Liechtenstein (+417)</option>
            <option data-countryCode="LT" value="370" <?php if(!empty($data['data'])) {if($data['data']['country'] == '370' ) echo 'selected' ;}?>>Lithuania (+370)</option>
            <option data-countryCode="LU" value="352" <?php if(!empty($data['data'])) {if($data['data']['country'] == '352' ) echo 'selected' ;}?>>Luxembourg (+352)</option>
            <option data-countryCode="MO" value="853" <?php if(!empty($data['data'])) {if($data['data']['country'] == '853' ) echo 'selected' ;}?>>Macao (+853)</option>
            <option data-countryCode="MK" value="389" <?php if(!empty($data['data'])) {if($data['data']['country'] == '389' ) echo 'selected' ;}?>>Macedonia (+389)</option>
            <option data-countryCode="MG" value="261" <?php if(!empty($data['data'])) {if($data['data']['country'] == '261' ) echo 'selected' ;}?>>Madagascar (+261)</option>
            <option data-countryCode="MW" value="265" <?php if(!empty($data['data'])) {if($data['data']['country'] == '265' ) echo 'selected' ;}?>>Malawi (+265)</option>
            <option data-countryCode="MY" value="60" <?php if(!empty($data['data'])) {if($data['data']['country'] == '60' ) echo 'selected' ;}?>>Malaysia (+60)</option>
            <option data-countryCode="MV" value="960" <?php if(!empty($data['data'])) {if($data['data']['country'] == '960' ) echo 'selected' ;}?>>Maldives (+960)</option>
            <option data-countryCode="ML" value="223" <?php if(!empty($data['data'])) {if($data['data']['country'] == '223' ) echo 'selected' ;}?>>Mali (+223)</option>
            <option data-countryCode="MT" value="356" <?php if(!empty($data['data'])) {if($data['data']['country'] == '356' ) echo 'selected' ;}?>>Malta (+356)</option>
            <option data-countryCode="MH" value="692" <?php if(!empty($data['data'])) {if($data['data']['country'] == '692' ) echo 'selected' ;}?>>Marshall Islands (+692)</option>
            <option data-countryCode="MQ" value="596" <?php if(!empty($data['data'])) {if($data['data']['country'] == '596' ) echo 'selected' ;}?>>Martinique (+596)</option>
            <option data-countryCode="MR" value="222" <?php if(!empty($data['data'])) {if($data['data']['country'] == '222' ) echo 'selected' ;}?>>Mauritania (+222)</option>
            <option data-countryCode="YT" value="269" <?php if(!empty($data['data'])) {if($data['data']['country'] == '269' ) echo 'selected' ;}?>>Mayotte (+269)</option>
            <option data-countryCode="MX" value="52" <?php if(!empty($data['data'])) {if($data['data']['country'] == '52' ) echo 'selected' ;}?>>Mexico (+52)</option>
            <option data-countryCode="FM" value="691" <?php if(!empty($data['data'])) {if($data['data']['country'] == '691' ) echo 'selected' ;}?>>Micronesia (+691)</option>
            <option data-countryCode="MD" value="373" <?php if(!empty($data['data'])) {if($data['data']['country'] == '373' ) echo 'selected' ;}?>>Moldova (+373)</option>
            <option data-countryCode="MC" value="377" <?php if(!empty($data['data'])) {if($data['data']['country'] == '377' ) echo 'selected' ;}?>>Monaco (+377)</option>
            <option data-countryCode="MN" value="976" <?php if(!empty($data['data'])) {if($data['data']['country'] == '976' ) echo 'selected' ;}?>>Mongolia (+976)</option>
            <option data-countryCode="MS" value="1664" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1664' ) echo 'selected' ;}?>>Montserrat (+1664)</option>
            <option data-countryCode="MA" value="212" <?php if(!empty($data['data'])) {if($data['data']['country'] == '212' ) echo 'selected' ;}?>>Morocco (+212)</option>
            <option data-countryCode="MZ" value="258" <?php if(!empty($data['data'])) {if($data['data']['country'] == '258' ) echo 'selected' ;}?>>Mozambique (+258)</option>
            <option data-countryCode="MN" value="95" <?php if(!empty($data['data'])) {if($data['data']['country'] == '95' ) echo 'selected' ;}?>>Myanmar (+95)</option>
            <option data-countryCode="NA" value="264" <?php if(!empty($data['data'])) {if($data['data']['country'] == '264' ) echo 'selected' ;}?>>Namibia (+264)</option>
            <option data-countryCode="NR" value="674" <?php if(!empty($data['data'])) {if($data['data']['country'] == '674' ) echo 'selected' ;}?>>Nauru (+674)</option>
            <option data-countryCode="NP" value="977" <?php if(!empty($data['data'])) {if($data['data']['country'] == '977' ) echo 'selected' ;}?>>Nepal (+977)</option>
            <option data-countryCode="NL" value="31" <?php if(!empty($data['data'])) {if($data['data']['country'] == '31' ) echo 'selected' ;}?>>Netherlands (+31)</option>
            <option data-countryCode="NC" value="687" <?php if(!empty($data['data'])) {if($data['data']['country'] == '687' ) echo 'selected' ;}?>>New Caledonia (+687)</option>
            <option data-countryCode="NZ" value="64" <?php if(!empty($data['data'])) {if($data['data']['country'] == '64' ) echo 'selected' ;}?>>New Zealand (+64)</option>
            <option data-countryCode="NI" value="505" <?php if(!empty($data['data'])) {if($data['data']['country'] == '505' ) echo 'selected' ;}?>>Nicaragua (+505)</option>
            <option data-countryCode="NE" value="227" <?php if(!empty($data['data'])) {if($data['data']['country'] == '227' ) echo 'selected' ;}?>>Niger (+227)</option>
            <option data-countryCode="NG" value="234" <?php if(!empty($data['data'])) {if($data['data']['country'] == '234' ) echo 'selected' ;}?>>Nigeria (+234)</option>
            <option data-countryCode="NU" value="683" <?php if(!empty($data['data'])) {if($data['data']['country'] == '683' ) echo 'selected' ;}?>>Niue (+683)</option>
            <option data-countryCode="NF" value="672" <?php if(!empty($data['data'])) {if($data['data']['country'] == '672' ) echo 'selected' ;}?>>Norfolk Islands (+672)</option>
            <option data-countryCode="NP" value="670" <?php if(!empty($data['data'])) {if($data['data']['country'] == '670' ) echo 'selected' ;}?>>Northern Marianas (+670)</option>
            <option data-countryCode="NO" value="47" <?php if(!empty($data['data'])) {if($data['data']['country'] == '47' ) echo 'selected' ;}?>>Norway (+47)</option>
            <option data-countryCode="OM" value="968" <?php if(!empty($data['data'])) {if($data['data']['country'] == '968' ) echo 'selected' ;}?>>Oman (+968)</option>
            <option data-countryCode="PK" value="92" <?php if(!empty($data['data'])) {if($data['data']['country'] == '92' ) echo 'selected' ;}?>>Pakistan (+92)</option>
            <option data-countryCode="PW" value="680" <?php if(!empty($data['data'])) {if($data['data']['country'] == '680' ) echo 'selected' ;}?>>Palau (+680)</option>
            <option data-countryCode="PA" value="507" <?php if(!empty($data['data'])) {if($data['data']['country'] == '507' ) echo 'selected' ;}?>>Panama (+507)</option>
            <option data-countryCode="PG" value="675" <?php if(!empty($data['data'])) {if($data['data']['country'] == '675' ) echo 'selected' ;}?>>Papua New Guinea (+675)</option>
            <option data-countryCode="PY" value="595" <?php if(!empty($data['data'])) {if($data['data']['country'] == '595' ) echo 'selected' ;}?>>Paraguay (+595)</option>
            <option data-countryCode="PE" value="51" <?php if(!empty($data['data'])) {if($data['data']['country'] == '51' ) echo 'selected' ;}?>>Peru (+51)</option>
            <option data-countryCode="PH" value="63" <?php if(!empty($data['data'])) {if($data['data']['country'] == '63' ) echo 'selected' ;}?>>Philippines (+63)</option>
            <option data-countryCode="PL" value="48" <?php if(!empty($data['data'])) {if($data['data']['country'] == '48' ) echo 'selected' ;}?>>Poland (+48)</option>
            <option data-countryCode="PT" value="351" <?php if(!empty($data['data'])) {if($data['data']['country'] == '351' ) echo 'selected' ;}?>>Portugal (+351)</option>
            <option data-countryCode="PR" value="1787" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1787' ) echo 'selected' ;}?>>Puerto Rico (+1787)</option>
            <option data-countryCode="QA" value="974" <?php if(!empty($data['data'])) {if($data['data']['country'] == '974' ) echo 'selected' ;}?>>Qatar (+974)</option>
            <option data-countryCode="RE" value="262" <?php if(!empty($data['data'])) {if($data['data']['country'] == '262' ) echo 'selected' ;}?>>Reunion (+262)</option>
            <option data-countryCode="RO" value="40" <?php if(!empty($data['data'])) {if($data['data']['country'] == '40' ) echo 'selected' ;}?>>Romania (+40)</option>
            <option data-countryCode="RU" value="7" <?php if(!empty($data['data'])) {if($data['data']['country'] == '7' ) echo 'selected' ;}?>>Russia (+7)</option>
            <option data-countryCode="RW" value="250" <?php if(!empty($data['data'])) {if($data['data']['country'] == '250' ) echo 'selected' ;}?>>Rwanda (+250)</option>
            <option data-countryCode="SM" value="378" <?php if(!empty($data['data'])) {if($data['data']['country'] == '378' ) echo 'selected' ;}?>>San Marino (+378)</option>
            <option data-countryCode="ST" value="239" <?php if(!empty($data['data'])) {if($data['data']['country'] == '239' ) echo 'selected' ;}?>>Sao Tome &amp; Principe (+239)</option>
            <option data-countryCode="SA" value="966" <?php if(!empty($data['data'])) {if($data['data']['country'] == '966' ) echo 'selected' ;}?>>Saudi Arabia (+966)</option>
            <option data-countryCode="SN" value="221" <?php if(!empty($data['data'])) {if($data['data']['country'] == '221' ) echo 'selected' ;}?>>Senegal (+221)</option>
            <option data-countryCode="CS" value="381" <?php if(!empty($data['data'])) {if($data['data']['country'] == '381' ) echo 'selected' ;}?>>Serbia (+381)</option>
            <option data-countryCode="SC" value="248" <?php if(!empty($data['data'])) {if($data['data']['country'] == '248' ) echo 'selected' ;}?>>Seychelles (+248)</option>
            <option data-countryCode="SL" value="232" <?php if(!empty($data['data'])) {if($data['data']['country'] == '232' ) echo 'selected' ;}?>>Sierra Leone (+232)</option>
            <option data-countryCode="SG" value="65" <?php if(!empty($data['data'])) {if($data['data']['country'] == '65' ) echo 'selected' ;}?>>Singapore (+65)</option>
            <option data-countryCode="SK" value="421" <?php if(!empty($data['data'])) {if($data['data']['country'] == '421' ) echo 'selected' ;}?>>Slovak Republic (+421)</option>
            <option data-countryCode="SI" value="386" <?php if(!empty($data['data'])) {if($data['data']['country'] == '386' ) echo 'selected' ;}?>>Slovenia (+386)</option>
            <option data-countryCode="SB" value="677" <?php if(!empty($data['data'])) {if($data['data']['country'] == '677' ) echo 'selected' ;}?>>Solomon Islands (+677)</option>
            <option data-countryCode="SO" value="252" <?php if(!empty($data['data'])) {if($data['data']['country'] == '252' ) echo 'selected' ;}?>>Somalia (+252)</option>
            <option data-countryCode="ZA" value="27" <?php if(!empty($data['data'])) {if($data['data']['country'] == '27' ) echo 'selected' ;}?>>South Africa (+27)</option>
            <option data-countryCode="ES" value="34" <?php if(!empty($data['data'])) {if($data['data']['country'] == '34' ) echo 'selected' ;}?>>Spain (+34)</option>
            <option data-countryCode="LK" value="94" <?php if(!empty($data['data'])) {if($data['data']['country'] == '94' ) echo 'selected' ;}?>>Sri Lanka (+94)</option>
            <option data-countryCode="SH" value="290" <?php if(!empty($data['data'])) {if($data['data']['country'] == '290' ) echo 'selected' ;}?>>St. Helena (+290)</option>
            <option data-countryCode="KN" value="1869" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1869' ) echo 'selected' ;}?>>St. Kitts (+1869)</option>
            <option data-countryCode="SC" value="1758" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1758' ) echo 'selected' ;}?>>St. Lucia (+1758)</option>
            <option data-countryCode="SR" value="597" <?php if(!empty($data['data'])) {if($data['data']['country'] == '597' ) echo 'selected' ;}?>>Suriname (+597)</option>
            <option data-countryCode="SD" value="249" <?php if(!empty($data['data'])) {if($data['data']['country'] == '249' ) echo 'selected' ;}?>>Sudan (+249)</option>
            <option data-countryCode="SZ" value="268" <?php if(!empty($data['data'])) {if($data['data']['country'] == '268' ) echo 'selected' ;}?>>Swaziland (+268)</option>
            <option data-countryCode="SE" value="46" <?php if(!empty($data['data'])) {if($data['data']['country'] == '46' ) echo 'selected' ;}?>>Sweden (+46)</option>
            <option data-countryCode="CH" value="41" <?php if(!empty($data['data'])) {if($data['data']['country'] == '41' ) echo 'selected' ;}?>>Switzerland (+41)</option>
            <!-- <option data-countryCode="SY" value="96 if(!empty($data['data'])) {<?php //if($data['data']['country'] == '="' ) echo 'selected'} ;?>3">Syria (+963)</option> -->
            <option data-countryCode="TW" value="886" <?php if(!empty($data['data'])) {if($data['data']['country'] == '886' ) echo 'selected' ;}?>>Taiwan (+886)</option>
            <option data-countryCode="TJ" value="992" <?php if(!empty($data['data'])) {if($data['data']['country'] == '992' ) echo 'selected' ;}?>>Tajikistan (+992)</option>
            <option data-countryCode="TH" value="66" <?php if(!empty($data['data'])) {if($data['data']['country'] == '66' ) echo 'selected' ;}?>>Thailand (+66)</option>
            <option data-countryCode="TG" value="228" <?php if(!empty($data['data'])) {if($data['data']['country'] == '228' ) echo 'selected' ;}?>>Togo (+228)</option>
            <option data-countryCode="TO" value="676" <?php if(!empty($data['data'])) {if($data['data']['country'] == '676' ) echo 'selected' ;}?>>Tonga (+676)</option>
            <option data-countryCode="TT" value="1868" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1868' ) echo 'selected' ;}?>>Trinidad &amp; Tobago (+1868)</option>
            <option data-countryCode="TN" value="216" <?php if(!empty($data['data'])) {if($data['data']['country'] == '216' ) echo 'selected' ;}?>>Tunisia (+216)</option>
            <option data-countryCode="TR" value="90" <?php if(!empty($data['data'])) {if($data['data']['country'] == '90' ) echo 'selected' ;}?>>Turkey (+90)</option>
            <option data-countryCode="TM" value="993" <?php if(!empty($data['data'])) {if($data['data']['country'] == '993' ) echo 'selected' ;}?>>Turkmenistan (+993)</option>
            <option data-countryCode="TC" value="1649" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1649' ) echo 'selected' ;}?>>Turks &amp; Caicos Islands (+1649)</option>
            <option data-countryCode="TV" value="688" <?php if(!empty($data['data'])) {if($data['data']['country'] == '688' ) echo 'selected' ;}?>>Tuvalu (+688)</option>
            <option data-countryCode="UG" value="256" <?php if(!empty($data['data'])) {if($data['data']['country'] == '256' ) echo 'selected' ;}?>>Uganda (+256)</option>
            <option data-countryCode="UA" value="380" <?php if(!empty($data['data'])) {if($data['data']['country'] == '380' ) echo 'selected' ;}?>>Ukraine (+380)</option>
            <option data-countryCode="AE" value="971" <?php if(!empty($data['data'])) {if($data['data']['country'] == '971' ) echo 'selected' ;}?>>United Arab Emirates (+971)</option>
            <option data-countryCode="UY" value="598" <?php if(!empty($data['data'])) {if($data['data']['country'] == '598' ) echo 'selected' ;}?>>Uruguay (+598)</option>
            <option data-countryCode="UZ" value="998" <?php if(!empty($data['data'])) {if($data['data']['country'] == '998' ) echo 'selected' ;}?>>Uzbekistan (+998)</option>
            <option data-countryCode="VU" value="678" <?php if(!empty($data['data'])) {if($data['data']['country'] == '678' ) echo 'selected' ;}?>>Vanuatu (+678)</option>
            <option data-countryCode="VA" value="379" <?php if(!empty($data['data'])) {if($data['data']['country'] == '379' ) echo 'selected' ;}?>>Vatican City (+379)</option>
            <option data-countryCode="VE" value="58" <?php if(!empty($data['data'])) {if($data['data']['country'] == '58' ) echo 'selected' ;}?>>Venezuela (+58)</option>
            <option data-countryCode="VN" value="84" <?php if(!empty($data['data'])) {if($data['data']['country'] == '84' ) echo 'selected' ;}?>>Vietnam (+84)</option>
            <option data-countryCode="VG" value="1" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1' ) echo 'selected' ;}?>>Virgin Islands - British (+1)</option>
            <option data-countryCode="VI" value="1" <?php if(!empty($data['data'])) {if($data['data']['country'] == '1' ) echo 'selected' ;}?>>Virgin Islands - US (+1)</option>
            <option data-countryCode="WF" value="681" <?php if(!empty($data['data'])) {if($data['data']['country'] == '681' ) echo 'selected' ;}?>>Wallis &amp; Futuna (+681)</option>
            <option data-countryCode="YE" value="969" <?php if(!empty($data['data'])) {if($data['data']['country'] == '969' ) echo 'selected' ;}?>>Yemen (North)(+969)</option>
            <option data-countryCode="YE" value="967" <?php if(!empty($data['data'])) {if($data['data']['country'] == '967' ) echo 'selected' ;}?>>Yemen (South)(+967)</option>
            <option data-countryCode="ZM" value="260" <?php if(!empty($data['data'])) {if($data['data']['country'] == '260' ) echo 'selected' ;}?>>Zambia (+260)</option>
            <option data-countryCode="ZW" value="263" <?php if(!empty($data['data'])) {if($data['data']['country'] == '263' ) echo 'selected' ;}?>>Zimbabwe (+263)</option>
        </select>
        <input type="text" name="phone" id="" required value="<?php if(!empty($data['data'])) echo $data['data']['phone'];?>">
        <?php if(isset($data['error']) && $data['error'] == 'phone'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <input type="text" name="email" id="" required value="<?php if(!empty($data['data'])) echo $data['data']['email'] ;?>">
        <?php if(isset($data['error']) && $data['error'] == 'email'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <span>enter password to save changes</span>
        <input type="password" name="password" id="" required>
        <?php if(isset($data['error']) && $data['error'] == 'password'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <?php if(isset($data['error']) && $data['error'] == 'all'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <button type="submit"  name="submit">Save</button>
    </form>
</div>