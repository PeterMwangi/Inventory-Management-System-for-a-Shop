$(document).ready(function() {
  var DOMAIN = "http://localhost/inventory/public_html/";

  addNewRow();

  $("#add").click(function() {
    addNewRow();
  });

  function addNewRow() {
    $.ajax({
      url: DOMAIN + "/includes/process.php",
      method: "POST",
      data: { getNewOrderItem: 1 },
      success: function(data) {
        $("#inovoice_item").append(data);
      }
    });
  }

  $("#remove").click(function() {
    $("#invoice_item").children("tr.last").remove;
  });
});
