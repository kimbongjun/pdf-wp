function pages() {
  var pages = document.querySelector(
    "#acf-field_5e9e52b053f20-field_5e9e52e453f24"
  );
  pages.addEventListener("change", function () {
    var pages = this.options[this.selectedIndex].value; // 선택한 페이지 수
    $.ajax({
      type: "POST",
      url: frontend_ajax_object.ajaxurl,
      data: {
        action: "load_manager_by_ajax",
        pages: pages,
      },
      beforeSend: function (e) {},
      success: function (data) {
        console.log(data);
      },
      error: function (e) {
        alert("자료가 없습니다.");
      },
    }).then(function () {});
  });
}

function pdf() {
  $('button[name="generate_posts_pdf"]').on("click", function () {
    $.ajax({
      type: "POST",
      url: frontend_ajax_object.ajaxurl,
      data: {
        action: "load_pdf",
        pages: pages,
      },
      beforeSend: function (e) {},
      success: function (data) {
        console.log(data);
      },
      error: function (e) {
        alert("자료가 없습니다.");
      },
    }).then(function () {});
  });
}

document.addEventListener("DOMContentLoaded", function () {
  pdf();
});
