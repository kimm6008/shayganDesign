jQuery( document ).ready( function( $ ) {
    "use strict";
    $('.table').DataTable({
        responsive: true,
    });
    /* =========================================================================================== */
    /* ============================ BOOTSTRAP 3/4 EVENT ========================================== */
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    });
    /* =========================================================================================== */

    /* make select search*/
    $(".standardSelect").chosen({
        disable_search_threshold: 10,
        no_results_text: "Oops, nothing found!",
        width: "85%"
    });

    $('#product_group_id').change(function () {

       let routeUrl= '/get_product_group_model?id=' + this.value;
       loadDataToComboBox({
           comboID : 'product_model_id',
           routeUrl : routeUrl,
           mainData : 'product_models',
           childData : 'product_model_translation',
           valueField : 'product_model_id',
           textField : 'name'
       });
    });

   $(".addprice").click(function (event)
   {
       event.preventDefault(); // Prevent default link behavior

       const productId = $(this).data("id"); // Get product ID from link

       // Show loading message inside modal
       $("#modal-content").html("<p>در حال بارگزاری...</p>");
       $("#add_product_price").modal('show'); // Open the modal

       $.ajax({
           url: "/ProductPrices/create",
           type: "GET",
           data: { product_id: productId },
           success: function (response) {
               $("#modal-content").html(response);
           },
           error: function () {
               $("#modal-content").html("<p>Failed to load prices. Please try again later.</p>");
           }
       });
   });
    $(".showprice").click(function (event)
    {
        event.preventDefault(); // Prevent default link behavior

        const productId = $(this).data("id"); // Get product ID from link

        // Show loading message inside modal
        $("#modal-content").html("<p>Loading prices...</p>");
        $("#show_product_price").modal('show'); // Open the modal

        $.ajax({
            url: "/ProductPrices/show",
            type: "GET",
            data: { product_id: productId },
            success: function (response) {
                $("#modal-content").html(response);
            },
            error: function () {
                $("#modal-content").html("<p>Failed to load prices. Please try again later.</p>");
            }
        });
    });
    $('#add_product_price').on('shown.bs.modal', function () {
        $("#persian_from_date").persianDatepicker(
            {
                format: 'YYYY/MM/DD',
                autoClose: true,
                initialValue: true
            }
        );
        $("#persian_to_date").persianDatepicker(
            {
                format: 'YYYY/MM/DD',
                autoClose: true,
                initialValue: false,
            }
        );
        $('#price').mask('#,##0', {reverse: true});

    });

})
function loadDataToComboBox(
    {
        comboID,
        routeUrl,
        mainData,
        childData,
        valueField,
        textField
    })
{
    const modelCombo = document.getElementById(comboID);
// Clear previous options and show "Loading..."
    modelCombo.innerHTML= '<option value="">Loading...</option>';

    fetch(routeUrl)
        .then(response => response.json())
        .then(data => {
            // Clear the loading message
            modelCombo.innerHTML = '';
            // Populate the dropdown with the new options
            if (data[mainData].length > 0) {
                data[mainData].forEach(item => {
                    const option = document.createElement('option');
                    option.value = item[childData][0][valueField];
                    option.textContent = item[childData][0][textField];
                    modelCombo.appendChild(option);

                });
            } else {
                // Optional: Handle case if no models are returned
                const option = document.createElement('option');
                option.value = '';
                option.textContent = 'رکوردی وجود ندارد';
                modelCombo.appendChild(option);
            }
        })
        .catch(error => {
            console.error('Error:', error);

            // Optional: Add a "Error loading models" option
            modelCombo.innerHTML = '<option value="">Error loading models</option>';
        }).finally(function (){
            $(modelCombo).trigger("chosen:updated");
        }
    );
}

