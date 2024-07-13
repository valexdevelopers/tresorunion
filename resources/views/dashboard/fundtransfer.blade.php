<!DOCTYPE html>
<html>
    @include('layouts.dashboard.dashboardhead')
    <body>
        <div class="page_wrapper">
            <div class="page_inner_wrapper">
                <div class="menu_wrapper"  id="menu_wrapper">
                    @include('layouts.dashboard.dashboardmenu')
                </div>
                <div class="main_page_wrapper">
                    <section class="sticky_header_section">
                        <header>
                            <div class="sticky_header">
                                <div class="mobile_menu_btn">
                                    <button type="button" class="menu_btn" id="menu_btn"><i class="bi bi-list-stars"></i></button>
                                </div>
                                <div class="page_navigation">
                                    <p ><span>Main</span> <i class="bi bi-chevron-right"></i><span>Overview</span></p>
                                </div>
                                <div class="sticky_header_right_nav">
                                    <div class="todays_date">
                                        <p>{{ date('l d m Y H:i a') }}</p>
                                    </div>
                                    <div class="notification bordered_btn">
                                       <a href="" class="notification_btn"><i class="bi bi-bell"></i></a> 
                                    </div>
                                    <div class="send_mail bordered_btn">
                                        <a href=""><i class="bi bi-envelope"></i></a>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                        </header>
                    </section>
                        <main>
                            <div class="this_page_title">
                                <h2>Fund Transfer</h2>
                            </div>

                            <div class="page_content">
                                <div class="left_page_content">
                                    <div class="trans_type_wrap">
                                        <div class="trans_type" id="intra_btn">
                                            <div class="bank_icon_lg">
                                                <i class="bi bi-bank"></i>
                                            </div>
                                            <div class="trans_acct">
                                                <p>Tresor Account</p>
                                            </div>
                                            
                                        </div>
                                        <div class="trans_type" id="local_btn">
                                            <div class="bank_icon_lg">
                                                <i class="bi bi-bank"></i>
                                            </div>
                                            <div class="trans_acct">
                                                <p>Local Banks</p>
                                            </div>
                                            
                                        </div>
                                        <div class="trans_type" id="foreign_btn">
                                            <div class="bank_icon_lg">
                                                <i class="bi bi-bank"></i>
                                            </div>
                                            <div class="trans_acct">
                                                <p>Foreign Accounts</p>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="transfer_form_wrap">
                                        @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                    
                                                </div>
                                            
                                            @endif
                                            @if(Session::has('message'))
                                                <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show " role="alert">
                                                    <strong>{{ Session::get('message') }}</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                                                </div>
                                            @endif
                                        <div class="transfer_form" id="intra_form">
                                            <form action="{{ route('user.transfer.store') }}" method="post">
                                                @csrf
                                                <div class="row form-row intra_transfer_step_one">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Select A Funding Account</label>
                                                            <select name="funding_account" id="" class="form-select" required>
                                                                <option value="" disabled selected>Select A Funding Account</option>
                                                                <option value="{{ Auth::user()->id }}">
                                                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} -
                                                                     {{ Auth::user()->accountnumber }} - 
                                                                     ${{ number_format($balance, 2) }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Destination Account</label>
                                                            <input type="number" class="form-control appearance-text-field" name="destination_account">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-row intra_transfer_step_one">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Destination Account Holder</label>
                                                            <input type="text" class="form-control" name="account_holder">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Amount</label>
                                                            <input type="number" class="form-control " min="5" step="10" name="amount">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-row intra_transfer_step_one">
                                                    <div class="col-sm-6 sm-d-none">
                                                        <div class="form-group">
                                                            <label for="">Description</label>
                                                            <input type="text" class="form-control " min="5" step="10" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label-btn">&nbsp;</label>
                                                            <button type="button" class="btn btn-success" id="intra_transfer_next">Confirm Transfer</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="row form-row transaction_pin" id="intra_transaction_pin" style="display: none;">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Transaction Pin</label>
                                                            <input type="number" class="form-control appearance-text-field" name="pin">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label-btn">&nbsp;</label>
                                                            <button type="submit" class="btn btn-success btn_process_transfer">Process Transfer</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </form>
                                        </div>
                                        
                                        <!-- local transfers  -->
                                        <div class="transfer_form" id="local_form">
                                            <form action="{{ route('user.transfer.store') }}" method="post">
                                                @csrf
                                                <div class="row form-row local_transfer_step_one">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Select A Funding Account</label>
                                                            <select name="funding_account" id="" class="form-select">
                                                                <option value="" disabled selected>Select A Funding Account</option>
                                                                <option value="{{ Auth::user()->id }}"> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} -
                                                                     {{ Auth::user()->accountnumber }} - 
                                                                     ${{ number_format($balance, 2) }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Destination Bank</label>
                                                            <input type="text" class="form-control" name="destination_bank">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row form-row local_transfer_step_one">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Destination Account</label>
                                                            <input type="number" class="form-control appearance-text-field" name="destination_account">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Destination Account Holder</label>
                                                            <input type="text" class="form-control" name="account_holder">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row form-row local_transfer_step_one">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Amount</label>
                                                            <input type="number" class="form-control" name="amount">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 sm-d-none">
                                                        <div class="form-group">
                                                            <label for="">Description</label>
                                                            <input type="text" class="form-control " min="5" step="10" name="description">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row form-row local_transfer_step_one">
                                                   
                                                    <div class="col-sm-6">
                                                        <div class="form-group d-block">
                                                            <label for="" class="form-label-btn">&nbsp;</label>
                                                            <button type="button" class="btn btn-success" id="local_transfer_next">Confirm Transfer</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form-row transaction_pin" id="local_transaction_pin" style="display: none">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Transaction Pin</label>
                                                            <input type="number" class="form-control appearance-text-field" name="pin">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label-btn">&nbsp;</label>
                                                            <button type="submit" class="btn btn-success">Confirm Transfer</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                        </div>



                                        <!-- foreign transfers  -->
                                        <div class="transfer_form" id="foreign_form">
                                            <form action="{{ route('user.transfer.store') }}" method="post">
                                                @csrf
                                                <div class="row form-row foreign_transfer_step_one">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Select A Funding Account</label>
                                                            <select name="funding_account" id="" class="form-select">
                                                                <option value="" disabled selected>Select A Funding Account</option>
                                                                <option value="{{ Auth::user()->id }}"> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} -
                                                                     {{ Auth::user()->accountnumber }} - 
                                                                     ${{ number_format($balance, 2) }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Beneficiary Country</label>
                                                            <select class="form-select"  name="country">
                                                                <option value="Afganistan">Afghanistan</option>
                                                                <option value="Albania">Albania</option>
                                                                <option value="Algeria">Algeria</option>
                                                                <option value="American Samoa">American Samoa</option>
                                                                <option value="Andorra">Andorra</option>
                                                                <option value="Angola">Angola</option>
                                                                <option value="Anguilla">Anguilla</option>
                                                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                <option value="Argentina">Argentina</option>
                                                                <option value="Armenia">Armenia</option>
                                                                <option value="Aruba">Aruba</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Austria">Austria</option>
                                                                <option value="Azerbaijan">Azerbaijan</option>
                                                                <option value="Bahamas">Bahamas</option>
                                                                <option value="Bahrain">Bahrain</option>
                                                                <option value="Bangladesh">Bangladesh</option>
                                                                <option value="Barbados">Barbados</option>
                                                                <option value="Belarus">Belarus</option>
                                                                <option value="Belgium">Belgium</option>
                                                                <option value="Belize">Belize</option>
                                                                <option value="Benin">Benin</option>
                                                                <option value="Bermuda">Bermuda</option>
                                                                <option value="Bhutan">Bhutan</option>
                                                                <option value="Bolivia">Bolivia</option>
                                                                <option value="Bonaire">Bonaire</option>
                                                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                <option value="Botswana">Botswana</option>
                                                                <option value="Brazil">Brazil</option>
                                                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                <option value="Brunei">Brunei</option>
                                                                <option value="Bulgaria">Bulgaria</option>
                                                                <option value="Burkina Faso">Burkina Faso</option>
                                                                <option value="Burundi">Burundi</option>
                                                                <option value="Cambodia">Cambodia</option>
                                                                <option value="Cameroon">Cameroon</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="Canary Islands">Canary Islands</option>
                                                                <option value="Cape Verde">Cape Verde</option>
                                                                <option value="Cayman Islands">Cayman Islands</option>
                                                                <option value="Central African Republic">Central African Republic</option>
                                                                <option value="Chad">Chad</option>
                                                                <option value="Channel Islands">Channel Islands</option>
                                                                <option value="Chile">Chile</option>
                                                                <option value="China">China</option>
                                                                <option value="Christmas Island">Christmas Island</option>
                                                                <option value="Cocos Island">Cocos Island</option>
                                                                <option value="Colombia">Colombia</option>
                                                                <option value="Comoros">Comoros</option>
                                                                <option value="Congo">Congo</option>
                                                                <option value="Cook Islands">Cook Islands</option>
                                                                <option value="Costa Rica">Costa Rica</option>
                                                                <option value="Cote DIvoire">Cote DIvoire</option>
                                                                <option value="Croatia">Croatia</option>
                                                                <option value="Cuba">Cuba</option>
                                                                <option value="Curaco">Curacao</option>
                                                                <option value="Cyprus">Cyprus</option>
                                                                <option value="Czech Republic">Czech Republic</option>
                                                                <option value="Denmark">Denmark</option>
                                                                <option value="Djibouti">Djibouti</option>
                                                                <option value="Dominica">Dominica</option>
                                                                <option value="Dominican Republic">Dominican Republic</option>
                                                                <option value="East Timor">East Timor</option>
                                                                <option value="Ecuador">Ecuador</option>
                                                                <option value="Egypt">Egypt</option>
                                                                <option value="El Salvador">El Salvador</option>
                                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                <option value="Eritrea">Eritrea</option>
                                                                <option value="Estonia">Estonia</option>
                                                                <option value="Ethiopia">Ethiopia</option>
                                                                <option value="Falkland Islands">Falkland Islands</option>
                                                                <option value="Faroe Islands">Faroe Islands</option>
                                                                <option value="Fiji">Fiji</option>
                                                                <option value="Finland">Finland</option>
                                                                <option value="France">France</option>
                                                                <option value="French Guiana">French Guiana</option>
                                                                <option value="French Polynesia">French Polynesia</option>
                                                                <option value="French Southern Ter">French Southern Ter</option>
                                                                <option value="Gabon">Gabon</option>
                                                                <option value="Gambia">Gambia</option>
                                                                <option value="Georgia">Georgia</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Ghana">Ghana</option>
                                                                <option value="Gibraltar">Gibraltar</option>
                                                                <option value="Great Britain">Great Britain</option>
                                                                <option value="Greece">Greece</option>
                                                                <option value="Greenland">Greenland</option>
                                                                <option value="Grenada">Grenada</option>
                                                                <option value="Guadeloupe">Guadeloupe</option>
                                                                <option value="Guam">Guam</option>
                                                                <option value="Guatemala">Guatemala</option>
                                                                <option value="Guinea">Guinea</option>
                                                                <option value="Guyana">Guyana</option>
                                                                <option value="Haiti">Haiti</option>
                                                                <option value="Hawaii">Hawaii</option>
                                                                <option value="Honduras">Honduras</option>
                                                                <option value="Hong Kong">Hong Kong</option>
                                                                <option value="Hungary">Hungary</option>
                                                                <option value="Iceland">Iceland</option>
                                                                <option value="Indonesia">Indonesia</option>
                                                                <option value="India">India</option>
                                                                <option value="Iran">Iran</option>
                                                                <option value="Iraq">Iraq</option>
                                                                <option value="Ireland">Ireland</option>
                                                                <option value="Isle of Man">Isle of Man</option>
                                                                <option value="Israel">Israel</option>
                                                                <option value="Italy">Italy</option>
                                                                <option value="Jamaica">Jamaica</option>
                                                                <option value="Japan">Japan</option>
                                                                <option value="Jordan">Jordan</option>
                                                                <option value="Kazakhstan">Kazakhstan</option>
                                                                <option value="Kenya">Kenya</option>
                                                                <option value="Kiribati">Kiribati</option>
                                                                <option value="Korea North">Korea North</option>
                                                                <option value="Korea Sout">Korea South</option>
                                                                <option value="Kuwait">Kuwait</option>
                                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                <option value="Laos">Laos</option>
                                                                <option value="Latvia">Latvia</option>
                                                                <option value="Lebanon">Lebanon</option>
                                                                <option value="Lesotho">Lesotho</option>
                                                                <option value="Liberia">Liberia</option>
                                                                <option value="Libya">Libya</option>
                                                                <option value="Liechtenstein">Liechtenstein</option>
                                                                <option value="Lithuania">Lithuania</option>
                                                                <option value="Luxembourg">Luxembourg</option>
                                                                <option value="Macau">Macau</option>
                                                                <option value="Macedonia">Macedonia</option>
                                                                <option value="Madagascar">Madagascar</option>
                                                                <option value="Malaysia">Malaysia</option>
                                                                <option value="Malawi">Malawi</option>
                                                                <option value="Maldives">Maldives</option>
                                                                <option value="Mali">Mali</option>
                                                                <option value="Malta">Malta</option>
                                                                <option value="Marshall Islands">Marshall Islands</option>
                                                                <option value="Martinique">Martinique</option>
                                                                <option value="Mauritania">Mauritania</option>
                                                                <option value="Mauritius">Mauritius</option>
                                                                <option value="Mayotte">Mayotte</option>
                                                                <option value="Mexico">Mexico</option>
                                                                <option value="Midway Islands">Midway Islands</option>
                                                                <option value="Moldova">Moldova</option>
                                                                <option value="Monaco">Monaco</option>
                                                                <option value="Mongolia">Mongolia</option>
                                                                <option value="Montserrat">Montserrat</option>
                                                                <option value="Morocco">Morocco</option>
                                                                <option value="Mozambique">Mozambique</option>
                                                                <option value="Myanmar">Myanmar</option>
                                                                <option value="Nambia">Nambia</option>
                                                                <option value="Nauru">Nauru</option>
                                                                <option value="Nepal">Nepal</option>
                                                                <option value="Netherland Antilles">Netherland Antilles</option>
                                                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                <option value="Nevis">Nevis</option>
                                                                <option value="New Caledonia">New Caledonia</option>
                                                                <option value="New Zealand">New Zealand</option>
                                                                <option value="Nicaragua">Nicaragua</option>
                                                                <option value="Niger">Niger</option>
                                                                <option value="Nigeria">Nigeria</option>
                                                                <option value="Niue">Niue</option>
                                                                <option value="Norfolk Island">Norfolk Island</option>
                                                                <option value="Norway">Norway</option>
                                                                <option value="Oman">Oman</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Palau Island">Palau Island</option>
                                                                <option value="Palestine">Palestine</option>
                                                                <option value="Panama">Panama</option>
                                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                                <option value="Paraguay">Paraguay</option>
                                                                <option value="Peru">Peru</option>
                                                                <option value="Phillipines">Philippines</option>
                                                                <option value="Pitcairn Island">Pitcairn Island</option>
                                                                <option value="Poland">Poland</option>
                                                                <option value="Portugal">Portugal</option>
                                                                <option value="Puerto Rico">Puerto Rico</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                <option value="Republic of Serbia">Republic of Serbia</option>
                                                                <option value="Reunion">Reunion</option>
                                                                <option value="Romania">Romania</option>
                                                                <option value="Russia">Russia</option>
                                                                <option value="Rwanda">Rwanda</option>
                                                                <option value="St Barthelemy">St Barthelemy</option>
                                                                <option value="St Eustatius">St Eustatius</option>
                                                                <option value="St Helena">St Helena</option>
                                                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                <option value="St Lucia">St Lucia</option>
                                                                <option value="St Maarten">St Maarten</option>
                                                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                <option value="Saipan">Saipan</option>
                                                                <option value="Samoa">Samoa</option>
                                                                <option value="Samoa American">Samoa American</option>
                                                                <option value="San Marino">San Marino</option>
                                                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Senegal">Senegal</option>
                                                                <option value="Seychelles">Seychelles</option>
                                                                <option value="Sierra Leone">Sierra Leone</option>
                                                                <option value="Singapore">Singapore</option>
                                                                <option value="Slovakia">Slovakia</option>
                                                                <option value="Slovenia">Slovenia</option>
                                                                <option value="Solomon Islands">Solomon Islands</option>
                                                                <option value="Somalia">Somalia</option>
                                                                <option value="South Africa">South Africa</option>
                                                                <option value="Spain">Spain</option>
                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                <option value="Sudan">Sudan</option>
                                                                <option value="Suriname">Suriname</option>
                                                                <option value="Swaziland">Swaziland</option>
                                                                <option value="Sweden">Sweden</option>
                                                                <option value="Switzerland">Switzerland</option>
                                                                <option value="Syria">Syria</option>
                                                                <option value="Tahiti">Tahiti</option>
                                                                <option value="Taiwan">Taiwan</option>
                                                                <option value="Tajikistan">Tajikistan</option>
                                                                <option value="Tanzania">Tanzania</option>
                                                                <option value="Thailand">Thailand</option>
                                                                <option value="Togo">Togo</option>
                                                                <option value="Tokelau">Tokelau</option>
                                                                <option value="Tonga">Tonga</option>
                                                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                <option value="Tunisia">Tunisia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="Turkmenistan">Turkmenistan</option>
                                                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                <option value="Tuvalu">Tuvalu</option>
                                                                <option value="Uganda">Uganda</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="Ukraine">Ukraine</option>
                                                                <option value="United Arab Erimates">United Arab Emirates</option>
                                                                <option value="United States of America">United States of America</option>
                                                                <option value="Uraguay">Uruguay</option>
                                                                <option value="Uzbekistan">Uzbekistan</option>
                                                                <option value="Vanuatu">Vanuatu</option>
                                                                <option value="Vatican City State">Vatican City State</option>
                                                                <option value="Venezuela">Venezuela</option>
                                                                <option value="Vietnam">Vietnam</option>
                                                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                <option value="Wake Island">Wake Island</option>
                                                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                <option value="Yemen">Yemen</option>
                                                                <option value="Zaire">Zaire</option>
                                                                <option value="Zambia">Zambia</option>
                                                                <option value="Zimbabwe">Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row form-row foreign_transfer_step_one">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Beneficiary Account Number</label>
                                                            <input type="number" class="form-control appearance-text-field" name="destination_account">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Beneficiary Bank</label>
                                                            <input type="text" class="form-control" name="destination_bank">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row form-row foreign_transfer_step_one">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Beneficiary Account Holder</label>
                                                            <input type="text" class="form-control" name="account_holder">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Amount</label>
                                                            <input type="number" class="form-control" name="amount">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row form-row foreign_transfer_step_one" >
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Description</label>
                                                            <input type="text" class="form-control " min="5" step="10" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label-btn">&nbsp;</label>
                                                            <button type="button" class="btn btn-success" id="foreign_transfer_next">Confirm Transfer</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row form-row transaction_pin" id="foreign_transaction_pin" style="display: none">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Transaction Pin</label>
                                                            <input type="number" class="form-control" name="pin">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label-btn">&nbsp;</label>
                                                            @if($transactionMethod == 'otp_pass.php')
                                                                <button type="button" class="btn btn-success" id="to_step_three">Process Transfer</button>
                                                            @else
                                                                <button type="submit" class="btn btn-success">Process Transfer</button>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                @if($transactionMethod == 'otp_pass.php')
                                                    <div class="row form-row transaction_pin" id="foreign_transaction_step_three"  style="display: none">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Security Token</label>
                                                                <input type="string" class="form-control" name="security_token">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-label-btn">&nbsp;</label>
                                                                <button type="button" class="btn btn-success" id="to_step_four">Process Transfer</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="row form-row transaction_pin" id="foreign_transaction_step_four"  style="display: none;">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Swift Code/BIC</label>
                                                                <input type="string" class="form-control" name="swift_code">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Swift Token</label>
                                                                <input type="string" class="form-control" name="swift_token">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-label-btn">&nbsp;</label>
                                                                <button type="submit" class="btn btn-success">Process Transfer</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row form-row transaction_pin" id="foreign_transaction_step_four"  style="display: none">
                                                        
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success">Process Transfer</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                @endif
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="right_page_content">
                                    <div class="card_slider_wrap">
                                        <div class="card_slider">
                                            <input type="radio" name="card" id="card1" class="card_btn">
                                            <input type="radio" name="card" id="card2" class="card_btn">
                                            <input type="radio" name="card" id="card3" class="card_btn">
                                            <div class="card_images">
                                                <img src="../assets/img/card1.avif" alt="" class="card_slides">
                                                <img src="../assets/img/card2.avif" alt="" class="card_slides">
                                                <img src="../assets/img/Suvidha.png" alt="" class="card_slides">
                                            </div>
                                            <div class="label_image">
                                                <label for="card1" class="card_label">
                                                    <img src="../assets/img/card1.avif" alt="" class="image_label">
                                                </label>
                                                <label for="card2" class="card_label">
                                                    <img src="../assets/img/card2.avif" alt="" class="image_label">
                                                </label>
                                                <label for="card3" class="card_label">
                                                    <img src="../assets/img/Suvidha.png" alt="" class="image_label">
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="recent_transactions">
                                        <div class="table_title">
                                            <h2>Recent Transactions</h2>

                                        </div>
                                        <table class="table table-hover">
                                            <tr class="bordered_table">
                                                <td>
                                                    <span class="recent_transactions_date">Mon Mar 16, 2024 10:12 am</span>
                                                    <p class="recent_transactions_description">TNF - Staff Salary For June</p>
                                                </td>
                                                <td>
                                                    <p class="trans_amout debit">-$300</p>
                                                    
                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="recent_transactions_date">Mon Mar 16, 2024 10:12 am</span>
                                                    <p class="recent_transactions_description">TNF - Staff Salary For June</p>
                                                </td>
                                                <td>
                                                    <p class="trans_amout debit">-$300</p>
                                                    
                                                </td>
                                               
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span class="recent_transactions_date">Mon Mar 16, 2024 10:12 am</span>
                                                    <p class="recent_transactions_description">TNF - Staff Salary For June</p>
                                                </td>
                                                <td>
                                                    <p class="trans_amout credit">$30,000.00</p>
                                                    
                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="recent_transactions_date">Mon Mar 16, 2024 10:12 am</span>
                                                    <p class="recent_transactions_description">TNF - Staff Salary For June</p>
                                                </td>
                                                <td>
                                                    <p class="trans_amout credit">$30,000.00</p>
                                                    
                                                </td>
                                               
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </main>
                    
                    
                </div>
            </div>
            
        </div>
        @include('layouts.dashboard.dashboardscripts')
    </body>
</html>