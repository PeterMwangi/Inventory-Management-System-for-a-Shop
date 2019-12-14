$(document).ready(function() {
  var DOMAIN = "http://localhost/inventory/public_html/";

  $("#register_form").on("submit", function() {
    var status = false;
    var name = $("#username");
    var email = $("#email");
    var pass1 = $("#password1");
    var pass2 = $("#password2");
    var type = $("#usertype");
    var n_patt = new RegExp(/^[A-Za-z ]+$/);
    var e_patt = new RegExp(
      /^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/
    );

    if (name.val() == "" || name.val().length < 6) {
      name.addClass("border-danger");
      $("#u_error").html(
        "<span class='text-danger'>Please Enter Name more than six characters long</span>"
      );
      status = false;
    } else {
      name.removeClass("border-danger");
      $("#u_error").html("");
      status = true;
    }

    if (!e_patt.test(email.val())) {
      email.addClass("border-danger");
      $("#e_error").html(
        "<span class='text-danger'>Enter a valid email address</span>"
      );
      status = false;
    } else {
      email.removeClass("border-danger");
      $("#e_error").html("");
      status = true;
    }

    if (pass1.val() == "" || pass1.val().length < 9) {
      email.addClass("border-danger");
      $("#p1_error").html(
        "<span class='text-danger'>Enter a password more than 9 charcters</span>"
      );
      status = false;
    } else {
      pass1.removeClass("border-danger");
      $("#p1_error").html("");
      status = true;
    }

    if (pass2.val() == "" || pass2.val().length < 9) {
      email.addClass("border-danger");
      $("#p2_error").html(
        "<span class='text-danger'>Enter a password more than 9 charcters</span>"
      );
      status = false;
    } else {
      pass2.removeClass("border-danger");
      $("#p2_error").html("");
      status = true;
    }

    if (type.val() == "") {
      type.addClass("border-danger");
      $("#t_error").html("<span class='text-danger'>Choose a Value</span>");
      status = false;
    } else {
      type.removeClass("border-danger");
      $("#t_error").html("");
      status = true;
    }

    if (pass1.val() == pass2.val() && status == true) {
      $.ajax({
        url: DOMAIN + "/includes/process.php",
        method: "POST",
        data: $("#register_form").serialize(),
        success: function(data) {
          if (data == "EMAIL_ALREADY_EXISTS") {
            alert("The email is already in use");
          } else if (data == "SOME_ERROR") {
            alert("There is an error");
          } else {
            window.location.href =
              DOMAIN + "/index.php?msg=You are now a registered user";
          }
        }
      });
    } else {
      pass2.removeClass("border-danger");
      $("#p2_error").html(
        "<span class='text-danger'>Your password doesn't match</span>"
      );
      status = true;
    }
  });

  //Authentication for Log-in

  $("#login_form").on("submit", function() {
    var email = $("#log_email");
    var password = $("#log_password");
    var status = false;

    if (email.val() == "") {
      email.addClass("border-danger");
      $("#elog_error").html(
        "<span class='text-danger'>Enter the email used during registration</span>"
      );
      status = false;
    } else {
      email.removeClass("border-danger");
      $("#elog_error").html("");
      status = true;
    }

    if (password.val() == "") {
      password.addClass("border-danger");
      $("#plog_error").html(
        "<span class='text-danger'>Input a valid password</span>"
      );
      status = false;
    } else {
      password.removeClass("border-danger");
      $("#plog_error").html("");
      status = true;
    }

    $.ajax({
      url: DOMAIN + "/includes/process.php",
      method: "POST",
      data: $("#login_form").serialize(),
      success: function(data) {
        if (data == "NOT_REGISTERD") {
          $("#elog_error").html(
            "<span class='text-danger'>First register with us for you to login</span>"
          );
        } else if (data == "PASSWORD_NOT_MATCHED") {
          $("#elog_error").html(
            "<span class='text-danger'>Please enter a valid password</span>"
          );
        } else {
          console.log(data);
          window.location.href =
            DOMAIN +
            "./dashboard.php?msg=Welcome to Peter's Inventory Management System";
        }
      }
    });
  });

  //Fetching the category
  fetch_category();

  function fetch_category() {
    $.ajax({
      url: DOMAIN + "./includes/process.php",
      method: "POST",
      data: { getCategory: 1 },
      success: function(data) {
        var root = "<option value='0'>Root</option>";
        var choose = "<option value='0'>Choose Category</option>";
        $("#parent_cat").html(root + data);
        $("#select_cat").html(choose + data);
      }
    });
  }

  //Fetching the Brand
  fetch_brand();

  function fetch_brand() {
    $.ajax({
      url: DOMAIN + "./includes/process.php",
      method: "POST",
      data: { getBrand: 1 },
      success: function(data) {
        var choose = "<option value='0'>Choose Brand</option>";

        $("#select_brand").html(choose + data);
      }
    });
  }

  //Adding Category

  $("#category_form").on("submit", function() {
    if ($("#category_name").val() == "") {
      $("#category_name").addClass("border-danger");
      $("#cat_error").html(
        "<span class='text-danger'>Please Enter Category Name</span>"
      );
    } else {
      $.ajax({
        url: DOMAIN + "/includes/process.php",
        method: "POST",
        data: $("#category_name").serialize(),
        success: function(data) {
          $("#category_name").removeClass("border-danger");
          $("#cat_error").html(
            "<span class='text-success'>New Category Added Successfully</span>"
          );
        }
      });
    }
  });

  //Adding Brand

  $("#brand_form").on("submit", function() {
    if ($("#brand_name").val() == "") {
      $("#brand_name").addClass("border-danger");
      $("#brand_error").html(
        "<span class='text-danger'>Please Enter Brand Name</span>"
      );
    } else {
      $.ajax({
        url: DOMAIN + "/includes/process.php",
        method: "POST",
        data: $("#brand_form").serialize(),
        success: function(data) {
          $("#brand_name").removeClass("border-danger");
          $("#brand_error").html(
            "<span class='text-success'>New Brand Added Successfully</span>"
          );
        }
      });
    }
  });

  //Add product

  $("#product_form").on("submit", function() {
    $.ajax({
      url: DOMAIN + "/includes/process.php",
      method: "POST",
      data: $("#product_form").serialize(),
      success: function(data) {
        if (data == "NEW_PRODUCT_ADDED") {
          alert("New product added successfully...");
          $("#product_name").val("");
          $("product_qty").val("");
        } else {
          console.log(data);
          alert(data);
        }
      }
    });
  });

  //Manage Category
  manageCategory();
  function manageCategory() {
    $.ajax({
      url: DOMAIN + "/includes/process.php",
      method: "POST",
      data: { manageCategory: 1 },
      success: function(data) {
        alert(data);
        $("#get_category").html(data);
        alert(data);
      }
    });
  }

  $("body").delegate(".del_cat", "click", function() {
    var did = $(this).attr("did");
    if (confirm("Are you sure you want to delete?")) {
      alert("Yes");
    } else {
      alert("No");
    }
  });

  //Manage Brand

  manageBrand(1);
  function manageBrand(pn) {
    $.ajax({
      url: DOMAIN + "/includes/process.php",
      method: "POST",
      data: { manageBrand: 1, pageno: pn },
      success: function(data) {
        $("#get_brand").html(data);
      }
    });
  }

  //Manage Products

  manageProducts(1);
  function manageProducts(pn) {
    $.ajax({
      url: DOMAIN + "/includes/process.php",
      method: "POST",
      data: { manageProducts: 1, pageno: pn },
      success: function(data) {
        $("#get_products").html(data);
      }
    });
  }

  $("body").delegate(".page-link", "click", function() {
    var pn = $(this).attr("pn");
    manageProducts(pn);
  });
});
