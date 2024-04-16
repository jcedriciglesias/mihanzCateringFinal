@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Services.css') }}">

    <div class="premade-form">
        <!-- No common content for both premade and customize -->
    </div>

    <div class="form-container ">
  


            
        <table class="table">
          <tr>
            <th scope="row" colspan="4" class="fs-1 " style="font-weight: 500;">Summary</th>
          </tr>
            <!-- User information -->
            <tr>
            <td class="fw-semibold"> Name:</td>

            <td>
            {{ $reservations->user->first_name . ' ' . $reservations->user->last_name }}
            </td>

            
          </tr>
          <tr>
            <td class="fw-semibold"> Email:</td>

            <td>
            {{$reservations->user->email}}
            </td>

          </tr>


            <!-- Event details -->

          <tr>
            <td class="fw-semibold">Contact No.:</td>
            <td>{{$reservations->user->contact_number}}</td>

          </tr>
          <tr>
            <th scope="row" colspan="4" class="fs-1 " style="font-weight: 500;">Celebrant Information</th>
          </tr>
        <tr>
            <td class="fw-semibold"> Name:</td>
            <td>
            {{$reservations->celebrant_name}}
            </td>
          </tr>
          <tr>
            <td class="fw-semibold"> Age:</td>
          <td>
          {{$reservations->celebrant_age}}
          </td>
          </tr>

            <tr>
              <td class="fw-semibold"> Gender:</td>
            <td>
            {{$reservations->celebrant_gender}}
            </td>
            
          </tr>
          <tr>
            <th scope="row" colspan="4" class="fs-1 " style="font-weight: 500;">Event Information</th>
          </tr>
          <!-- Package Information -->
          <tr>
              <td class="fw-semibold"> Event:</td>
              <td>
                  @if ($reservations->reservationSelection->choice == 'premade')
                      {{ $reservations->premades->servicePackage->serviceSelection->services_category }}
                  @elseif ($reservations->reservationSelection->choice == 'customize')
                      {{ $reservations->reservationSelection->categoryName }}
                  @endif
              </td>
               <!-- Additional Sections based on Reservation Type -->
              @if ($reservations->reservationSelection->choice == 'premade')
                <!-- Premade Reservation Section -->   
            </tr>
            <tr>
              <td class="fw-semibold">Package Type:</td>
              <td>{{ $reservations->premades->servicePackage->name }}</td>
            </tr>
            <tr>
              <td class="fw-semibold"> Pax:</td>
              <td>
               {{ $reservations->premades->servicePackage->pax }}
              </td>
            </tr>
            <tr>
              <td class="fw-semibold"> Price:</td>
              <td>
                {{ $reservations->premades->servicePackage->price }}
              </td>
            </tr>
            <tr>
                <td class="fw-semibold">Theme: </td>
                <td>{{ $reservations->event_theme }}</td>
            
            
            </tr>

        
          @elseif ($reservations->reservationSelection->choice == 'customize')
              <!-- Customize Reservation Section -->
            
                <tr>
                  <td class="fw-semibold">Package Type:</td>
                  <td>Customized</td>
                </tr>
                <tr>
                  <td class="fw-semibold">Date of Event:</td>
                <td>
                {{$reservations->event_date}}
                </td>
                
    
              </tr>
              <tr>
                <td class="fw-semibold"> Time of Event:</td>
                <td>
                {{$reservations->event_time}}
                </td>
                
              </tr>
    
              <tr>
                <td class="fw-semibold"> Event Location:</td>
                <td>{{$reservations->venue_address}}</td>
              </tr>
                  <tr>
                    <td class="fw-semibold">Theme: </td>
                    <td>{{ $reservations->event_theme }}</td>
                    
                    
                </tr>
                <tr>
                  <th scope="row" colspan="4" class="fs-1 " style="font-weight: 500;">Package Information</th>
                </tr>
                <tr>
                  {{-- Options --}}
                  <td class="fw-semibold">Option Selected</td>
                  <td>
                  {{ $reservations->reservationCustomize->option }}
                  </td>
                </tr>
                {{-- Guest Package --}}
                <tr>
                  <td class="fw-semibold">Package Guest:</td>
                  <td>{{ number_format($reservations->reservationCustomize->pax  )  }}</td>
                </tr>
                {{-- Recommended Guest--}}
                <tr>
                  <td class="fw-semibold">Recommended Guest:</td>
                  <td>{{ number_format(round($reservations->reservationCustomize->price /350)  )  }}</td>
                </tr>
                {{-- Buffer --}}
                <tr>
                  <td class="fw-semibold">Buffer:</td>
                  <td>10</td>
                </tr>
                {{-- Additional Charge --}}
                <tr>
                  <td class="fw-semibold"> Charge:</td>
                  <td>{{ number_format(round(( $reservations->reservationCustomize->pax - round($reservations->reservationCustomize->price / 350 ))*350  )) }}</td>
                </tr>
                 {{-- Budget --}}
                 
                 <tr>
                  <td class="fw-semibold"> Total Amount:</td>
                  <td>{{  number_format(floor(( $reservations->reservationCustomize->pax - floor($reservations->reservationCustomize->price / 350 ))*350  )+floor($reservations->reservationCustomize->price ) )}}</td>
              </tr>
                

                  <!-- ... other customize reservation fields ... -->
              </tr>
        
              <!-- ... other package information fields ... -->
              @endif

         
          <tr>
            <th scope="row" colspan="4" class="fs-1 " style="font-weight: 500;">Menu</th>
          </tr>
          <tr>
            <td class="fw-semibold ">Beef: </td>
            <td>{{ $reservations->getMenuName('beefMenu') }}</td>
           
          </tr>
          <tr>
            <td class="fw-semibold"> Pork: </td>
            <td>{{ $reservations->getMenuName('porkMenu') }}</td>
          </tr>


          <tr>
            <td class="fw-semibold">Chicken: </td>
            <td>{{ $reservations->getMenuName('chickenMenu') }}</td>
           
          </tr>
          <tr>
            <td class="fw-semibold">Vegetables: </td>
            <td>{{ $reservations->getMenuName('vegetableMenu') }}</td>
          </tr>

          <tr>
            <td class="fw-semibold">Fish: </td>
            <td>{{ $reservations->getMenuName('fishMenu') }}</td>
            
          </tr>
          <tr>
            <td class="fw-semibold">Seafood:</td>
            <td>{{ $reservations->getMenuName('seafoodMenu') }}</td>
          </tr>

          <tr>
            <td class="fw-semibold">Dessert: </td>
            <td>{{ $reservations->getMenuName('dessertMenu') }}</td>
            
          </tr>
          <tr>
            <td class="fw-semibold">Drinks: </td>
            <td>{{ $reservations->getMenuName('drinkMenu') }}</td> 
          </tr>

          <tr>
            <td class="fw-semibold">Pasta: </td>
            <td>{{ $reservations->getMenuName('pastaMenu') }}</td>
            

          </tr>
          <tr>
            <th scope="row" colspan="4" class="fs-1 " style="font-weight: 500;">Other Information</th>
            <td></td>
          </tr>
          <tr>
            <td class=" fw-semibold">Allergies:</td>
            <td>
              {{ $reservations->allergies }}
            </td>
          </tr>
          <tr>
            <td class=" fw-semibold">Special Request:</td>
            <td>
               {{ $reservations->special }}
            </td>
          </tr>
          <tr>
            <td class=" fw-semibold">Other Concern:</td>
            <td>
              {{ $reservations->other }}
            </td>
          </tr>

          <tr>
            <th scope="row" colspan="4" class="fs-1 " style="font-weight: 500;">Additional services</th>
            <td></td>
          </tr>
          <tr>
            <td>
              <div class="fs-6 d-flex justify-content-start text-danger w-75"> <i>*Additional Service will have additional charge</i></div>
            </td>
            <td></td>
          </tr>
          <tr>
            <td class=" fw-semibold">
              Party Entertainers
            </td>
            <td></td>
          </tr>
          <tr>
            <td class=" fs-5">
              <p class=" m-3">{{ $reservations->getAdditionalName('peMenu') }}   </p>
            </td>
            <td>{{ $reservations->getAdditionalPrice('peMenu') }}</td>
          </tr>
          <tr>
            <td class="fw-semibold">
              Photo Booth
            </td>
            <td></td>
          </tr>
          <tr>
            <td class=" fs-5">
              <p class=" m-3">{{ $reservations->getAdditionalName('pbMenu') }}  </p>
            </td>
            <td>{{ $reservations->getAdditionalPrice('pbMenu') }}</td>
          </tr>
          <tr>
            <td class="fw-semibold">
              Chocolate Fountain Booth
            </td>
            <td></td>
          </tr>
          <tr>
            <td class=" fs-5">
              <p class=" m-3">{{ $reservations->getAdditionalName('cfMenu') }} </p>
            </td>
            <td>{{ $reservations->getAdditionalPrice('cfMenu') }}</td>
          </tr>
          <tr>
            <td class="fw-semibold">
              Face Painting Booth
            </td>
            <td></td>
          </tr>
          <tr>
            <td class=" fs-5">
              <p class=" m-3">{{ $reservations->getAdditionalName('fpMenu') }}</p>
            </td>
            <td> {{ $reservations->getAdditionalPrice('fpMenu') }}</td>
          </tr>
         
          <tr>
            <td class="fw-semibold">
              Cupcake Tower Booth
            </td>
            <td></td>
          </tr>
          <tr>
            <td class=" fs-5">
              <p class=" m-3">{{ $reservations->getAdditionalName('ctMenu') }} </p>
            </td>
            <td>{{ $reservations->getAdditionalPrice('ctMenu') }}</td>
          </tr>
          <tr>
            <td class="fw-semibold">
              Fruits Booths
            </td>
            <td></td>
           
          </tr>
          <tr>
            <td class=" fs-5">
              <p class=" m-3">{{ $reservations->getAdditionalName('fMenu') }}  </p>
            </td>
            <td >{{ $reservations->getAdditionalPrice('fMenu') }}</td>
          </tr>
        
        </table>
        <div class=" w-50 total-table " >
          <table class="table table-bordered ">
          @if ($reservations->reservationSelection->choice == 'premade')
            <tr>
              <td class="fw-semibold">
                Budget:
              </td>
              <td>{{ $reservations->premades->servicePackage->price }}</td>
             
            </tr>
             <tr>
              <td class="fw-semibold">
                Total Additional Services:
              </td>
              <td>{{ $reservations->getAdditionalPrice('peMenu') + $reservations->getAdditionalPrice('pbMenu') + $reservations->getAdditionalPrice('cfMenu') 
                + $reservations->getAdditionalPrice('fpMenu') + $reservations->getAdditionalPrice('ctMenu') + $reservations->getAdditionalPrice('fMenu')}}</td>
             
            </tr>

            <tr>
              <td class="fw-semibold text-bg-secondary">
               Total Amount:
              </td>
              <td class="text-bg-secondary">{{ $reservations->premades->servicePackage->price + $reservations->getAdditionalPrice('peMenu') + $reservations->getAdditionalPrice('pbMenu') + $reservations->getAdditionalPrice('cfMenu') 
                + $reservations->getAdditionalPrice('fpMenu') + $reservations->getAdditionalPrice('ctMenu') + $reservations->getAdditionalPrice('fMenu')}} </td>
             
            </tr>
            

            @elseif ($reservations->reservationSelection->choice == 'customize')
            <tr>
              <td class="fw-semibold">
                Budget:
              </td>
      
              <td>{{ number_format($reservations->reservationCustomize->price  )  }}</td>
             
            </tr>
             <tr>
              <td class="fw-semibold">
                Total Additional Services:
              </td>
              <td>{{ $reservations->getAdditionalPrice('peMenu') + $reservations->getAdditionalPrice('pbMenu') + $reservations->getAdditionalPrice('cfMenu') 
                + $reservations->getAdditionalPrice('fpMenu') + $reservations->getAdditionalPrice('ctMenu') + $reservations->getAdditionalPrice('fMenu')}}</td>
             
            </tr>
         
            <tr>
              <td class="fw-semibold">
               Charge:
              </td>
              @if($reservations->reservationCustomize->option == 'option 2')
              <td>{{ number_format(round(( $reservations->reservationCustomize->pax - round($reservations->reservationCustomize->price / 350 ))*350  )) }}</td>
              @else
              <td>{{ number_format(round(( $reservations->reservationCustomize->pax - round($reservations->reservationCustomize->price / 350 ))*350  )) }}</td>
             @endif
            </tr>
           
            <tr>
              <td class="fw-semibold text-bg-secondary">
               Total Amount:
              </td>
              @if($reservations->reservationCustomize->option == 'option 1')
              <td class="text-bg-secondary">{{$reservations->reservationCustomize->price + $reservations->getAdditionalPrice('peMenu') + $reservations->getAdditionalPrice('pbMenu') + $reservations->getAdditionalPrice('cfMenu') 
                + $reservations->getAdditionalPrice('fpMenu') + $reservations->getAdditionalPrice('ctMenu') + $reservations->getAdditionalPrice('fMenu')}} </td>
                @else
                <td class="text-bg-secondary">{{$reservations->reservationCustomize->price + $reservations->getAdditionalPrice('peMenu') + $reservations->getAdditionalPrice('pbMenu') + $reservations->getAdditionalPrice('cfMenu') 
                + $reservations->getAdditionalPrice('fpMenu') + $reservations->getAdditionalPrice('ctMenu') + $reservations->getAdditionalPrice('fMenu') + round(( $reservations->reservationCustomize->pax - round($reservations->reservationCustomize->price / 350 ))*350  )}} </td>
                @endif
            </tr>
            @endif
          </table>
        </div>
        <hr>
        
        
        <div class="btn-position justify-content-center m-5">
            <a href="{{ route('generate.pdf',$reservations->id) }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Download PDF File</a>
        </div>
       
        <div class="fs-5 mb-4 fst-italic w-75 justify-content-center" style="text-align: center"><p>Your reservation will be reviewed within <b class=" text-success" >24hours</b>, thank you for considering Mihanz Catering as your event's caterer</p></div>
        <div class="fs-5 mb-3 fst-italic">Disclaimer: For any changes please contact the catering.</div>
    </div>
@endsection
