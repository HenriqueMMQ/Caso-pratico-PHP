var discount = 0;

var open_google = false;
var open_zdnet = false;

function load_google_news() {
  var url = "https://news.google.com/rss?hl=pt-PT&gl=PT&ceid=PT:pt-150";
  if (open_google == false) {
    open_google = true;
    open_zdnet = false;
    $.ajax({
      url: "https://api.rss2json.com/v1/api.json?rss_url=" + url,
      type: "GET",
      success: function (data) {
        objeto_json = eval(data);
        frase = "";
        for (i = 0; i < objeto_json.items.length; i++) {
          frase = frase + "<br/><b>" + objeto_json.items[i].title + "</b><br/>";
          frase = frase + objeto_json.items[i].description + "<br/>";
        }
        $("#news_feed").html(frase);
        $("#first_sec").html("Notícias Google");
      },
      error: function (xhr, status) {
        alert("Ocorreu um erro.");
      },
    });
  } else {
    open_google = false;

    $("#news_feed").html("Conteudo AJAX com as notícias");
    $("#first_sec").html("Notícias");
  }
}

function load_zdnet_news() {
  var url = "https://www.zdnet.com/news/rss.xml";
  if (open_zdnet == false) {
    open_zdnet = true;
    open_google = false;
    $.ajax({
      url: "https://api.rss2json.com/v1/api.json?rss_url=" + url,
      type: "GET",
      success: function (data) {
        objeto_json = eval(data);
        phrase = "";
        for (i = 0; i < objeto_json.items.length; i++) {
          phrase = phrase + "<b>" + objeto_json.items[i].title + "</b><br/>";
          phrase = phrase + objeto_json.items[i].description + "<br/>";
          phrase =
            phrase +
            '<a href="' +
            objeto_json.items[i].link +
            '">' +
            objeto_json.items[i].link +
            "<a/><br/><br/>";
        }
        $("#news_feed").html(phrase);
        $("#first_sec").html("Notícias ZD Net");
      },
      error: function (xhr, status) {
        alert("Ocorreu um erro.");
      },
    });
  } else {
    open_zdnet = false;

    $("#news_feed").html("Conteudo AJAX com as notícias");
    $("#first_sec").html("Notícias");
  }
}

$(document).ready(function () {
  $("#date_limit").change(function () {
    var months_limit = $("#date_limit").val();

    if (months_limit >= 4) {
      discount = 0.2;
    } else if (months_limit == 1) {
      discount = 0.05;
    } else if (months_limit == 2) {
      discount = 0.1;
    } else if (months_limit == 3) {
      discount = 0.15;
    } else {
      discount = 0;
      alert("Insira um limite válido (Número inteiro maior que 0).");
    }

    $("#final_discount").val("Desconto = " + discount * 100 + "%");
  });

  $(".news-title").click(function () {
    $(this).closest("form").find(".description-container").slideToggle();
  });
});

var boxes = $("input[class=cb_wishlist]:checked");

function check_checkbox() {
  checked_checkboxes = document.querySelectorAll(
    'input[type="checkbox"]:checked'
  ).length;
  $("#final_price").val(
    "€ " + (checked_checkboxes * 400 - checked_checkboxes * 400 * discount)
  );
}

function bad_validation(input_name, color) {
  if (color == "red") {
    document.getElementById(input_name).style.border = "2px solid red";
  } else {
    document.getElementById(input_name).style.border = "2px solid green";
  }
}

var valid_name = false;

function user_validation(input_name) {
  var nameRegex = /^[a-z\d_]{4,15}$/i;

  if (input_name.value.match(nameRegex)) {
    bad_validation("name", "green");
    valid_name = true;
  } else {
    bad_validation("name", "red");
    valid_name = false;
  }
}

var valid_nick = false;

function nick_validation(input_name) {
  var nickRegex = /^[a-z\d_]{4,15}$/i;

  if (input_name.value.match(nickRegex)) {
    bad_validation("nickname", "green");
    valid_nick = true;
  } else {
    bad_validation("nickname", "red");
    valid_nick = false;
  }
}

var valid_phone = false;

function phone_validation(input_phone) {
  var phoneRegex = /(9[1236]\d) ?(\d{3}) ?(\d{3})/;

  if (!input_phone.value.startsWith(9)) {
    alert("Telemóvel não começa com 9.");
    input_phone.value = "";
  }

  if (input_phone.value.match(phoneRegex)) {
    bad_validation("phone", "green");
    valid_phone = true;
  } else {
    bad_validation("phone", "red");
    valid_phone = false;
  }
}

var valid_email = false;

function email_validation(input_email) {
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (input_email.value.match(emailRegex)) {
    bad_validation("email", "green");
    valid_email = true;
  } else {
    bad_validation("email", "red");
    valid_email = false;
  }

  if (!emailRegex.test(String(input_email.value).toLowerCase())) {
    alert("Email inválido");
    return false;
  }
}

var valid_reason = false;

function reason_validation(reason_input) {
  var reasonRegex = /^[a-z\d_]{5,200}$/i;

  if (reason_input.value.match(reasonRegex)) {
    bad_validation("reason", "green");
    valid_reason = true;
  } else {
    bad_validation("reason", "red");
    valid_reason = false;
  }
}

var valid_password = false;

function password_validation(password_input) {
  var passwordRegex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*d)[a-zA-Zd]{8,}$";

  if (password_input.value.match(passwordRegex)) {
    bad_validation("password", "green");
    valid_password = true;
  } else {
    bad_validation("password", "red");
    valid_password = false;
  }
}
