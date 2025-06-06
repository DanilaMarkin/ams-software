// Отслеживаем изменения в select
document.getElementById("carSort").addEventListener("change", function () {
  const selectedType = this.value;
  const items = document.querySelectorAll(".car-item");

  items.forEach((item) => {
    const bodyType = item.getAttribute("data-body-type");

    // Если есть совпадения, то показываем выбранный тип кузова
    if (selectedType === "" || bodyType === selectedType) {
      item.classList.remove("d-none");
    } else {
      // Если нет совпадения, то скрываем
      if (!item.classList.contains("d-none")) {
        item.classList.add("d-none");
      }
    }
  });
});
