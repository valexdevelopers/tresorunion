<script type="text/javascript">
    const ageData = [
    {month: 'Jun', count: 30900},
    {month: 'Jul', count: 10020},
    {month: 'Aug', count: 8120},
    {month: 'Sept', count: 20299},
    {month: 'Oct', count: 9000},
    {month: 'Nov', count: 45000},
    {month: 'Dec', count: 11307},
    {month: 'Jan', count: 20000},
    {month: 'Feb', count: 37000},
    {month: 'Mar', count: 8000},
    
];
const ctx1 = document.getElementById('myChart');
//initial bar chart
// new Chart(ctx1, {
//     type: 'bar',
//     data: {
//         labels: ageData.map(row => row.month),
//         datasets: [
//         {
//             label: 'User Data By Age',
//             data: ageData.map(row => row.count),

//         }
//         ]
//     }
//     }
// );

new Chart(ctx1, {
type: 'line',
data: {
    labels: ageData.map(row => row.month),
    datasets: [
    {
        label: 'Net Cash Flow',
        data: ageData.map(row => row.count),
        fill: true,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.4,
        drawActiveElementsOnTop: true,
        showLine:true,
        // cubicInterpolationMode: 'monotone',
    }
    ]
},
options: {
    // animations: {
    //     tension: {
    //         duration: 1000,
    //         easing: 'linear',
    //         from: 1,
    //         to: 0,
    //         loop: true
    //     }
    // },
    scales: {
        y: { // defining min and max so hiding the dataset does not change scale range
            min: 0,
            max: 70000
        }
    },
    responsive:true,
    maintainAspectRatio:false,
    
}
} );


</script>


<script type="text/javascript">
    $(document).ready( function () {
       // transfer page
        $('#intra_btn').click(function() {
            
            $('#intra_form').css('display', 'block');
            $('#local_form').css('display', 'none');
            $('#foreign_form').css('display', 'none');
            
        });

        $('#local_btn').click(function() {
            $('#local_form').css('display', 'block');
            $('#intra_form').css('display', 'none');
            $('#foreign_form').css('display', 'none');
            
        });

        $('#foreign_btn').click(function() {
            $('#foreign_form').css('display', 'block');
            $('#intra_form').css('display', 'none');
            $('#local_form').css('display', 'none');
            
        });

        $('#intra_transfer_next').click(function (){
            $('.intra_transfer_step_one').css('display', 'none');
            $('#intra_form').css('display', 'block');
            $('#intra_transaction_pin').css('display', 'flex');
            
        });

        $('#local_transfer_next').click(function (){
            $('.local_transfer_step_one').css('display', 'none');
            $('#local_form').css('display', 'block');
            $('#local_transaction_pin').css('display', 'flex');
        });

        $('#foreign_transfer_next').click(function (){
            $('.foreign_transfer_step_one').css('display', 'none');
            $('#foreign_form').css('display', 'block');
            $('#foreign_transaction_pin').css('display', 'flex')
            
        });

        $('#to_step_three').click(function (){
            $('.foreign_transfer_step_one').css('display', 'none');
            $('#foreign_form').css('display', 'block');
            $('#foreign_transaction_pin').css('display', 'none')
            $('#foreign_transaction_step_three').css('display', 'flex')
        });

        $('#to_step_four').click(function (){
            $('.foreign_transfer_step_one').css('display', 'none');
            $('#foreign_form').css('display', 'block');
            $('#foreign_transaction_pin').css('display', 'none')
            $('#foreign_transaction_step_three').css('display', 'none')
            $('#foreign_transaction_step_four').css('display', 'flex')
        });
        
    } );
</script>

<script type="text/javascript">
$(document).ready( function () {

    

    // menu
    $('#menu_btn').click(function (){
        // alert('fdff')
        
        $("#menu_wrapper").animate({
            width: "300px",
            left: "0",
        });
    });

    $('#close_menu').click(function (){
        $('#menu_wrapper').animate({
            width: "0px",
           left: "-200px",
        })
        // $("#menu_wrapper").css({
        //     display: "none",
        // });
    });

} );
</script>

<script type="text/javascript">
$(document).ready( function () {
    $('#mydatatable').DataTable();
    
} );
</script>