<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/PDF.css">
    <title>PDF</title>
</head>
<body>
    <!-- Summary -->
    <main>
        <div>
            <div class="logo"><img src="images/mihanzLogo.png" alt="" height="100px"></div>
        </div>

        <div class="display-4 fw-medium mb-3 " >
            Summary
        </div>
        <!-- Informations -->
        <div class="w-100 " style="margin-bottom:10%">
            <table class="table table-bordered">
{{-- Client Information --}}
                <tr>
                    <th>Name:</th>
                    <td>{{ $reservation->user->first_name . ' ' . $reservation->user->last_name }}</td>
                </tr>

                <tr>
                    <th>Contact No. :</th>
                    <td>{{$reservation->user->contact_number}}</td>
                </tr>

                <tr>
                    <th>Email:</th>
                    <td colspan="">{{$reservation->user->email}}</td>
                </tr>
{{-- Celebrant Information --}}
                <tr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2" style="font-weight: 500; font-size:50px">Celebrant information</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Name:</th>
                                <td>{{$reservation->celebrant_name}}</td>
                            </tr>
                            <tr>
                                <th>Age:</th>
                                <td>{{$reservation->celebrant_age}}</td>
                            </tr>
    
                            <tr>
                                <th >Gender:</th>
                                <td colspan="4">{{$reservation->celebrant_gender}}</td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                
                <tr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2" class=" " style="font-weight: 500; font-size:50px">Event Information</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Date -->
                             <tr>
                                <th>Date:</th>
                                <td>{{$reservation->event_date}}</td>                                  
                            </tr>
<!-- Time -->  
                            <tr>
                                <th>Time:</th>
                                <td>{{$reservation->event_time}}
                                </td>
                            </tr>
<!-- Type of event -->
                            <tr>
                               
                                <th>Type of event:</th>
                                <td>
                                    @if ($reservation->reservationSelection->choice == 'premade')
                                        {{ $reservation->premades->servicePackage->serviceSelection->services_category }}
                                    @elseif ($reservation->reservationSelection->choice == 'customize')
                                        {{ $reservation->reservationSelection->categoryName }}
                                    @endif
                                </td>
                            </tr>
<!-- Location -->
                            <tr>
                                <th>Location:</th>
                                <td>{{$reservation->venue_address}}</td>
                            </tr>
                            <tr>
                                @if ($reservation->reservationSelection->choice == 'premade')
<!-- Package Type -->
                                <th>
                                    Package type:
                                </th>
                                <td>
                                {{ $reservation->premades->servicePackage->name }}
                                </td>
                            </tr>
<!-- Pax -->
                            <tr>
                                 <th>
                                    Pax:
                                </th>
                                <td>
                                {{ $reservation->premades->servicePackage->pax }}
                                </td>
                            </tr>
<!-- Price -->
                            <tr>
                                <th>
                                    Price:
                                </th>
                                <td>
                                {{ $reservation->premades->servicePackage->price }}
                                </td>
<!-- Theme -->
                                </tr>
                                <tr>
                                    <th>
                                        Theme:
                                    </th>
                                    <td>
                                    {{ $reservation->event_theme }}
                                    </td>
                                </tr>
                                <tr>
                                @elseif ($reservation->reservationSelection->choice == 'customize')
<!-- Package Type -->
                                <th>
                                    Package type:
                                </th>
                                <td>
                                Customized
                                </td>
                            </tr>
<!-- Pax -->                        
                                <tr>
                                <th>
                                    Pax:
                                </th>
                                <td>
                                {{ number_format($reservation->reservationCustomize->pax) }}
                                </td>
                            </tr>
  <!-- Price -->
                            <tr>
                              
                                <th>Price:</th>
                                <td>{{number_format( $reservation->reservationCustomize->price) }}</td> 
                            </tr>
                            <tr>
                                <!-- Theme -->
                                <th>
                                    Theme:
                                </th>
                                <td>
                                {{ $reservation->event_theme }}
                                </td>
                                @endif
                            </tr>
{{-- Other Information --}}
                            <tr>
                                <th  colspan="4" style="font-weight: 500; font-size:50px">Other Information</th>
                            </tr>
{{-- Allergies --}}
                            <tr>
                                <th>Allergies:</th>
                                <td>{{ $reservation->allergies }}</td>
                            </tr>
{{-- Special request --}}
                            <tr>
                                <th>Special request:</th>
                                <td> {{ $reservation->special }}</td>
                            </tr>
{{-- Other Concern --}}
                            <tr>
                                <th>Other Concern:</th>
                                <td>{{ $reservation->other }}</td>
                            </tr>

                        </tbody>
                    </table>
                </tr>
<!-- Menu -->
                <tr>
                    <table class="table">
                        <thead>
                            <th colspan="4" style="font-weight: 500; font-size:50px">Menu
                            </th>
                        </thead>
                        <tbody>
<!-- Pork -->
                            <tr>
                                <th>Pork:</th>
                                <td>{{ $reservation->getMenuName('porkMenu') }}</td>
                            </tr>
 <!-- Beef -->
                            <tr>
                                <th>Beef:</th>
                                <td>{{ $reservation->getMenuName('beefMenu') }}</td>
                            </tr>
<!-- Pasta -->
                            <tr>
                                <th>Pasta:</th>
                                <td>{{ $reservation->getMenuName('pastaMenu') }}</td>
                            </tr>
<!-- Chicken -->
                            <tr>
                                <th>Chicken:</th>
                                <td>{{ $reservation->getMenuName('chickenMenu') }}</td>
                            </tr>
 <!-- Vegetables -->
                            <tr>
                                <th>Vegetables:</th>
                                <td>{{ $reservation->getMenuName('vegetableMenu') }}</td>
                            </tr>
<!-- Fish -->
                            <tr>
                                <th>Fish:</th>
                                <td>{{ $reservation->getMenuName('fishMenu') }}</td>
                            </tr>
<!-- Seafood -->
                            <tr>
                                <th>Seafood:</th>
                                <td>{{ $reservation->getMenuName('seafoodMenu') }}</td>
                            </tr>
<!-- Dessert -->
                            <tr>
                                <th>Dessert:</th>
                                <td>{{ $reservation->getMenuName('dessertMenu') }}</td>
                            </tr>
<!-- Drinks -->
                            <tr>
                                <th>Drinks:</th>
                                <td>{{ $reservation->getMenuName('drinkMenu') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table>
                        <tr>
                           <th style="font-weight: 500; font-size:50px">Additional services</th>    
                          </tr>
{{--  Party Entertainers --}}
                          <tr>
                            <td class="fw-bolder">
                              Party Entertainers
                            </td>
                          </tr>
                          <tr>
                            <td class="">
                              <p class=" m-3">{{ $reservation->getAdditionalName('peMenu') }} - {{ $reservation->getAdditionalPrice('peMenu') }}</p>
                            </td>
                          </tr>
{{-- Photo Booth --}}
                          <tr>
                            <td class="fw-bolder">
                              Photo Booth
                            </td>
                          </tr>
                          <tr>
                            <td class="">
                              <p class=" m-3">{{ $reservation->getAdditionalName('pbMenu') }} - {{ $reservation->getAdditionalPrice('pbMenu') }}</p>
                            </td>
                          </tr>
{{-- Chocolate Fountain Booth --}}
                          <tr>
                            <td class="fw-bolder">
                              Chocolate Fountain Booth
                            </td>
                          </tr>
                          <tr>
                            <td class="">
                              <p class=" m-3">{{ $reservation->getAdditionalName('cfMenu') }} - {{ $reservation->getAdditionalPrice('cfMenu') }}</p>
                            </td>
                          </tr>
{{-- Face Painting Booth --}}
                          <tr>
                            <td class="fw-bolder">
                              Face Painting Booth
                            </td>
                          </tr>
                          <tr>
                            <td class="">
                              <p class=" m-3">{{ $reservation->getAdditionalName('fpMenu') }} - {{ $reservation->getAdditionalPrice('fpMenu') }}</p>
                            </td>
                          </tr>
{{-- Cupcake Tower Booth --}}
                          <tr>
                            <td class="fw-bolder">
                              Cupcake Tower Booth
                            </td>
                          </tr>
                          <tr>
                            <td class="">
                              <p class=" m-3">{{ $reservation->getAdditionalName('ctMenu') }} - {{ $reservation->getAdditionalPrice('ctMenu') }}</p>
                            </td>
                          </tr>
{{--  Fruits Booths --}}
                          <tr>
                            <td class="fw-bolder">
                              Fruits Booths
                            </td>
                           
                          </tr>
                          <tr>
                            <td class="">
                              <p class=" m-3">{{ $reservation->getAdditionalName('fMenu') }} - {{ $reservation->getAdditionalPrice('fMenu') }}</p>
                            </td>
                          </tr>
                    </table>
                </tr>
                <tr>
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($reservation->reservationSelection->choice == 'premade')
                            <tr>
                              <td class="fw-semibold">
                                Budget:
                              </td>
                              <td>{{ $reservation->premades->servicePackage->price }}</td>
                             
                            </tr>
                             <tr>
                              <td class="fw-semibold">
                                Total Additional Services:
                              </td>
                              <td>{{ $reservation->getAdditionalPrice('peMenu') + $reservation->getAdditionalPrice('pbMenu') + $reservation->getAdditionalPrice('cfMenu') 
                                + $reservation->getAdditionalPrice('fpMenu') + $reservation->getAdditionalPrice('ctMenu') + $reservation->getAdditionalPrice('fMenu')}}</td>
                             
                            </tr>
                
                            <tr>
                              <td class="fw-semibold text-bg-secondary">
                               Total Amount:
                              </td>
                              <td class="text-bg-secondary">{{ $reservation->premades->servicePackage->price + $reservation->getAdditionalPrice('peMenu') + $reservation->getAdditionalPrice('pbMenu') + $reservation->getAdditionalPrice('cfMenu') 
                                + $reservation->getAdditionalPrice('fpMenu') + $reservation->getAdditionalPrice('ctMenu') + $reservation->getAdditionalPrice('fMenu')}} </td>
                             
                            </tr>
                            
                
                            @elseif ($reservation->reservationSelection->choice == 'customize')
                            <tr>
                              <td class="fw-semibold">
                                Budget:
                              </td>
                      
                              <td>{{ number_format($reservation->reservationCustomize->price  )  }}</td>
                             
                            </tr>
                             <tr>
                              <td class="fw-semibold">
                                Total Additional Services:
                              </td>
                              <td>{{ $reservation->getAdditionalPrice('peMenu') + $reservation->getAdditionalPrice('pbMenu') + $reservation->getAdditionalPrice('cfMenu') 
                                + $reservation->getAdditionalPrice('fpMenu') + $reservation->getAdditionalPrice('ctMenu') + $reservation->getAdditionalPrice('fMenu')}}</td>
                             
                            </tr>
                         
                            <tr>
                              <td class="fw-semibold">
                               Charge:
                              </td>
                              @if($reservation->reservationCustomize->option == 'option 2')
                              <td>{{ number_format(round(( $reservation->reservationCustomize->pax - round($reservation->reservationCustomize->price / 350 ))*350  )) }}</td>
                              @else
                              <td>{{ number_format(round(( $reservation->reservationCustomize->pax - round($reservation->reservationCustomize->price / 350 ))*350  )) }}</td>
                             @endif
                            </tr>
                           
                            <tr>
                              <td class="fw-semibold text-bg-secondary">
                               Total Amount:
                              </td>
                              @if($reservation->reservationCustomize->option == 'option 1')
                              <td class="text-bg-secondary">{{$reservation->reservationCustomize->price + $reservation->getAdditionalPrice('peMenu') + $reservation->getAdditionalPrice('pbMenu') + $reservation->getAdditionalPrice('cfMenu') 
                                + $reservation->getAdditionalPrice('fpMenu') + $reservation->getAdditionalPrice('ctMenu') + $reservation->getAdditionalPrice('fMenu')}} </td>
                                @else
                                <td class="text-bg-secondary">{{$reservation->reservationCustomize->price + $reservation->getAdditionalPrice('peMenu') + $reservation->getAdditionalPrice('pbMenu') + $reservation->getAdditionalPrice('cfMenu') 
                                + $reservation->getAdditionalPrice('fpMenu') + $reservation->getAdditionalPrice('ctMenu') + $reservation->getAdditionalPrice('fMenu') + round(( $reservation->reservationCustomize->pax - round($reservation->reservationCustomize->price / 350 ))*350  )}} </td>
                                @endif
                            </tr>
                            @endif
                            </tbody>
                    </table>
                </tr>
                
            </table>
        </div>
        <!-- Package inclusion -->
        <div class="w-100">
            <table class="table table-borderless">
                <thead>
                    <th style="font-weight: 500; font-size:50px">
                        Package included
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <th > BASIC SETUP OF BACKDROP</th>
                        <th>COMPLETE SETUP OF BUFFET</th>
                      </tr>
                      <tr>
                        <th>GIFT TABLE</th>
                        <th>CAKE TABLE</th>
                      </tr>
                      <tr>
                        <th>SKIRTING</th>
                        <th>CHAIRS & TABLE WITH COVER</th>
                      </tr>
                      <tr>
                        <th>WAITER & FOOD ATTENDANT</th>
                        <th>UTENSILS</th>
                      </tr>
                </tbody>
            </table>

        </div>
        <!-- Payment -->
        <div class="w-100 mt-5" style="margin-bottom: 300px;">
            <div class="display-6 fw-bold">
                Payments:
            </div>
            <!-- paragraph 1 -->
            <div class="w-100 mt-3 mb-3">
                <b>Deposit:</b> Fifty percent (50%) of the agreed contract cost, is due and demandable upon booking, to be deducted from the Total Final Payment, unless other prior arrangements have been made.
            </div>
            <!-- paragraph 2 -->
            <div  class="w-100 mt-3 mb-3">
                <b>Final Payment:</b> Will be due and demandable five (5) days prior the client’s event. Payment terms are available upon request.
            </div>
            <!-- paragraph 3 -->
            <div class="w-100 mt-3 mb-3">
                <b>Payment Method:</b> All prices quoted are based on cash payments.
            </div>
            <!--  -->
            <div>
                <pre>
<b>Partial Payment:</b> ____________________________ <b>Date:</b> __________________
Balance Payment Schedule:
<b>Date:</b> _______________________________ <b>Amount:</b> ________________
<b>Date:</b> _______________________________ <b>Amount:</b> ________________
<b>Date:</b> _______________________________ <b>Amount:</b> ________________
<b>Date:</b> _______________________________ <b>Amount:</b> ________________

                </pre>
            
        </div>
    </div>
    <!-- Terms and Condition -->
    <div class="w-100 mb-5">
        <div class="w-100 fw-bold display-6 mb-5">
            <u>Terms and Conditions:</u>
        </div>
        <div >
       
            <h2>1.RESERVATION.</h2>
            <p> Non-refundable reservation fee of 1000php is required to block your desired date. Must be made personally by the CLIENT or any authorized person. Endorsement letter may also be honored in behalf of the CLIENT <i class="text-info"> Ang non-refundable reservation fee na 1000php ay kinakailangan para ma-block ang iyong gustong petsa. Dapat gawin ng personal ng CLIENT o sinumang awtorisadong tao. Ang liham ng pag-endorso ay maaari ding parangalan sa ngalan ng CLIENT.</i></p>
            <h2>2.TERMS OF PAYMENT.</h2>
            <p>The client is required to settle fifty percent (50%) of the total contract cost 3 weeks before the event. CLIENT should pay cash, bank deposit or bank transfer. To : bank details and account number.<i class="text-info">Kinakailangang bayaran ng kliyente ang limampung porsyento (50%) ng kabuuang halaga ng kontrata 3 linggo bago ang kaganapan. Ang CLIENT ay dapat magbayad ng cash, bank deposit o bank transfer. Para sa : mga detalye ng bangko at account number.</i></p>
                <ol type="a">
                    <li>
                        <p>Full payment must be paid on or right after the event. CLIENT should only pay in cash (for any balance and additionals made). CLIENTS who wish to pay full amount are highly encouraged to avoid hassles during and after the event.<i class="text-info"> Dapat bayaran ang buong bayad sa mismong araw o pagkatapos ng kaganapan. Ang CLIENT ay dapat magbayad lamang ng cash (para sa anumang balanse at mga karagdagang ginawa). Lubos na hinihikayat ang mga kliyente na gustong magbayad ng buong halaga na upang maiwasan ang mga abala sa panahon at pagkatapos ng kaganapan
                        </i></p>
                    </li>
                </ol>
            <h2>3.ACTUAL CATERING.</h2>
            <p>Inclusive of 4 hours service time. Mihanz Catering reserves the right to charge an extra amount equivalent to 10% per hour of extension of the contracted amount if the agreed end time of service is exceeded unreasonably. CLIENT will be billed for additional staff hours (100php/staff/hr) for any time extension beyond the prior agreed time.<i class="text-info">Sakop ang 4 na oras na serbisyo. Inilalaan ng Mihanz Catering ang karapatang maningil ng dagdag na halaga na katumbas ng 10% kada oras ng pagpapalawig ng kinontratang halaga kung ang napagkasunduang oras ng pagtatapos ng serbisyo ay lumampas nang hindi makatwiran. Sisingilin ang CLIENT para sa karagdagang oras ng staff (100php/staff/hr) para sa anumang pagpapalawig ng oras na lampas sa naunang napagkasunduan na oras.</i></p>
            <h2>4.GUEST COUNT.</h2>
            <p> Final guest count, not subject to reduction, is due five (5) days before the event. Any additional guest after the stated period is subject to extra charges as may be imposed by Mihanz Catering. </p>
                <ol type="a">
                    <li>
                        <p> Should there be any changes to the number of guests specified in the CLIENTS original booking; the CLIENT shall notify Mihanz in advance thru the following: phone call or in person. <i class="text-info">Ang panghuling bilang ng bisita, hindi napapailalim sa pagbabawas, ay dapat bayaran limang (5) araw bago ang kaganapan. Ang sinumang karagdagang bisita pagkatapos ng nakasaad na panahon ay napapailalim sa mga dagdag na singil na maaaring ipataw ng Mihanz Catering. Kung mayroong anumang mga pagbabago sa bilang ng mga bisita na tinukoy sa orihinal na booking ng CLIENTS; aabisuhan ng CLIENT si Mihanz nang maaga sa pamamagitan ng sumusunod: tawag sa telepono o nang personal.</i></p>
                    </li>
                    <li>
                        <p>Should the CLIENT failed to disclose to notify Mihanz with additional number of guests, Mihanz is not to be held liable for the insufficiency of food and any complaint that might occur. <i class="text-info">Kung nabigo ang CLIENT na ipaalam kay Mihanz ang karagdagang bilang ng mga bisita, hindi mananagot si Mihanz para sa kakulangan ng pagkain at anumang reklamo na maaaring mangyari.</i></p>
                    </li>
                </ol>
                <h2>5.RENTALS.</h2>
                <p>Mihanz Catering may provide all or part the rental items for the event. However, certain items may incur restocking & cancellation fees. If Mihanz Catering arranges rentals, for the CLIENT, through a rental company, CLIENT will have to pay the rental company directly. Any loss or damage to any rentals will be billed to CLIENT after the event.<i class="text-info"> Maaaring ibigay ng Mihanz Catering ang lahat o bahagi ng mga paupahang bagay para sa kaganapan. Gayunpaman, maaaring magkaroon ng mga bayarin sa pag-restock at pagkansela ang ilang partikular na item. Kung ang Mihanz Catering ay nag-aayos ng mga rental, para sa CLIENT, sa pamamagitan ng isang kumpanya ng pag-upa, ang CLIENT ay kailangang magbayad nang direkta sa kumpanya ng pag-upa. Ang anumang pagkawala o pinsala sa anumang mga rental ay sisingilin sa CLIENT pagkatapos ng kaganapan.</i></p>
                <ol type="A">
                    <li>
                        <p>We encourage CLIENT to make sure that all equipment used will be packed and returned after the event. Any MIHANANZ property that will be left at the venue is a CLIENT'S responsibility. Should MIHANZ need to arrange pickup for any left equipment, it is in expense of the CLIENT or additional bill will be made. Any loss or damage will be charged to the CLIENT. <i class="text-info"> Hinihikayat namin ang CLIENT na tiyakin na ang lahat ng kagamitang ginamit ay maiimpake at ibabalik pagkatapos ng kaganapan. Ang anumang property ng MIHANANZ na maiiwan sa venue ay responsibilidad ng CLIENT. Kung kailangang ayusin ng MIHANZ ang pickup para sa anumang natitirang kagamitan, ito ay nasa gastos ng CLIENT o karagdagang singil ay gagawin. Ang anumang pagkawala o pinsala ay sisingilin sa CLIENT.</i></p>
                    </li>
                </ol>
                <h2>6.OTHER CHARGES.</h2>
                <p> Corkage, bond and other fees required by venues and other 3rd party suppliers are charged to client.<i class="text-info">Ang corkage, bond at iba pang mga bayarin na kinakailangan ng mga venue at iba pang 3rd party na supplier ay sinisingil sa kliyente.</i></p>
                <ol type="A">
                    <li>
                        <p>Any <b>MIHANZ</b> equipment left at the venue should be returned the next day or else it will be subject to additional fee of ____ per day. Any loss or damage to MIHANZ’s property will be billed accordingly<i class="text-info"> Ang anumang kagamitan ng MIHANZ na naiwan sa venue ay dapat ibalik sa susunod na araw o kung hindi, ito ay sasailalim sa karagdagang bayad na ____ bawat araw. Ang anumang pagkawala o pinsala sa ari-arian ng MIHANZ ay sisingilin nang naaayon.</i></p>
                    </li>
                    <li>
                        <p><b>LEFTOVERS.</b>  All leftovers will be given to the CLIENT or authorized representative available at the time of turnover.<i class="text-info">Lahat ng natirang pagkain ay ibibigay sa CLIENT o awtorisadong kinatawan na available sa oras ng turnover.</i></p>
                    </li>
                    <li>
                        <p> <b> GIFTS.</b>   CLIENT shall oversee all gifts and other personal belongings at all times.In the event of loss and/or damage,MIHANZ shall not be held liable. <i class="text-info"> Pangasiwaan ng CLIENT ang lahat ng regalo at iba pang personal na pag-aari sa lahat ng oras. Kung sakaling mawala at/o masira, hindi mananagot si Mihanz.</i></p>
                    </li>
                    <li>
                        <p><b>CANCELLATION BY: CLIENT / VENUE / ACTS OF GOD</b></p>
                        <p>All prepayments and deposits are returned in full, if the event is cancelled by CLIENT, the venue or by an act of God, 30 days or more, from the event date. <i class="text-info">Ang lahat ng mga prepayment at deposito ay ibinabalik nang buo, kung ang kaganapan ay kinansela ng CLIENT, ang lugar o sa pamamagitan ng pagkilos ng Diyos, 30 araw o higit pa, mula sa petsa ng kaganapan.</i></p>
                        <ol type="a">
                            <li>
                                <p>If the event is canceled, fifteen (15) days or more from the event date, all prepayments and deposits are returned to CLIENT in full (less Fifty percent (50%) of the prepayment or deposit amount.)<i class="text-info">Kung kinansela ang kaganapan, labinlimang (15) araw o higit pa mula sa petsa ng kaganapan, lahat ng prepayment at deposito ay ibabalik sa CLIENT nang buo (mas mababa sa Limampung porsyento (50%) ng halaga ng prepayment o deposito.)</i></p>
                            </li>
                            <li>
                                <p>If the event is canceled, less than fifteen (15) days of the event date, all deposits and prepayments are not refundable.<i class="text-info"> Kung kinansela ang kaganapan, wala pang labinlimang (15) araw ng petsa ng kaganapan, ang lahat ng mga deposito at prepayment ay hindi maibabalik.</i></p>
                            </li>
                            <li>
                                <p>If CATERER is able to re-book the date with a similar event, all prepayments and deposits are returned in full (less Php_________ service fee).<i class="text-info">Kung ang CATERER ay makakapag-book muli ng petsa na may katulad na kaganapan, ang lahat ng mga prepayment at deposito ay ibinabalik nang buo (mas mababa ang Php_________ na bayad sa serbisyo).</i></p>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <p> <b>CANCELLATION BY CATERER.</b>  CATERER reserves the right to terminate this contract for any valid reason.<i class="text-info"> Inilalaan ng CATERER ang karapatang wakasan ang kontratang ito para sa anumang wastong dahilan.</i></p>
                        <ol type="a">
                            <li>
                                <p>IF Mihanz Catering terminates this contract before thirty (30) day period prior to the event date, all deposits and prepayments will be returned in full within ten (10) days.<i class="text-info"> Kung wakasan ng Mihanz Catering ang kontratang ito bago ang tatlumpung (30) araw bago ang petsa ng kaganapan, lahat ng deposito at prepayment ay ibabalik nang buo sa loob ng sampung (10) araw.</i></p>
                            </li>
                            <li>
                                <p>IF Mihanz Catering terminates this contract within the thirty (30) day period prior to the event date, all deposits and prepayments will be returned in full within ten (10) days as well as an additional PHP____________ as penalty.<i class="text-info"> KUNG tatapusin ng Mihanz Catering ang kontratang ito sa loob ng tatlumpung (30) araw bago ang petsa ng kaganapan, lahat ng deposito at prepayment ay ibabalik nang buo sa loob ng sampung (10) araw pati na rin ang karagdagang PHP____________ bilang multa.</i></p>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <p> <b>CHANGES. </b> This contract may not be modified orally. Any changes must be in writing and signed by all parties.<i class="text-info">Ang kontratang ito ay hindi maaaring baguhin nang pasalita. Ang anumang mga pagbabago ay dapat nakasulat at nilagdaan ng lahat ng partido.</i></p>
                    </li>
                </ol>
  
  
  
  
  
                <div>
                  
                </div>
        </div>
        <!-- Signature -->
        <div class="w-100 mt-5 signature" >
            <div class="signatureClient">
                
                <b> Signatory over prited name</b>
            </div>
            <div class="signatureMihanz">
                <b>
                    
                    Signatory of Mihanz Catering
                </b>
            </div>
         </div>
    </div>
    </main>
    
</body>
</html>