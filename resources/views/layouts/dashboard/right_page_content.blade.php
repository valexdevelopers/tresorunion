
    <div class="card_slider_wrap">
        <div class="card_slider">
            <input type="radio" name="card" id="card1" class="card_btn">
            <input type="radio" name="card" id="card2" class="card_btn">
            <input type="radio" name="card" id="card3" class="card_btn">
            <div class="card_images">
                <img src="../userdashboard/img/card1.avif" alt="" class="card_slides">
                <img src="../userdashboard/img/card2.avif" alt="" class="card_slides">
                <img src="../userdashboard/img/Suvidha.png" alt="" class="card_slides">
            </div>
            <div class="label_image">
                <label for="card1" class="card_label">
                    <img src="../userdashboard/img/card1.avif" alt="" class="image_label">
                </label>
                <label for="card2" class="card_label">
                    <img src="../userdashboard/img/card2.avif" alt="" class="image_label">
                </label>
                <label for="card3" class="card_label">
                    <img src="../userdashboard/img/Suvidha.png" alt="" class="image_label">
                </label>
            </div>
        </div>

    </div>
    <div class="recent_transactions">
        <div class="table_title">
            <h2>Recent Transactions</h2>

        </div>
        <table class="table table-hover">
            @if(Auth::user()->passbooks->count() > 0)
                @foreach(Auth::user()->passbooks as $passbook)
                    <tr class="bordered_table">
                        <td>
                            <span class="recent_transactions_date">{{ date_format(date_create($passbook->trans_date), 'l d m Y H:i a') }}</span>
                            <p class="recent_transactions_description">{{ $passbook->description }}</p>
                        </td>
                        <td>
                            <p class="trans_amout {{ $passbook->trans_type }}">${{ number_format($passbook->amount) }}</p>
                            
                        </td>
                        
                    </tr>
                @endforeach
            
            @endif
            
        </table>
    </div>
