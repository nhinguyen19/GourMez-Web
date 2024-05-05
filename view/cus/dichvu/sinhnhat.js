

function formatNumber(number) {
  return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}


function get_info_food() {
  let names = document.getElementsByName("name_of_food");
  let prices = document.getElementsByName("price");
  let quantities = document.getElementsByName("quantity");
  let img = document.querySelectorAll(".option1 img");
  let checks = document.getElementsByName("choose");

  for (let i = 0; i < checks.length; i++) {
    if (checks[i].checked) 
      {
      let name_food = names[i].innerText;
      let quantity = parseInt(quantities[i].value);
      // Remove non-numeric characters (like comma) from the price
      let price = parseInt(prices[i].innerText.replace(/\D/g, ''));
      let img_src = img[i].getAttribute("src");
      
      // Update the content of the div with class "total_box"
      let totalBox = document.querySelector('.total_box');
      let total_price = quantity * price;
      
      // Format total_price as desired
      let formatted_total_price = formatNumber(total_price);

      
      
      totalBox.innerHTML = '<img src = "'+ img_src + '"'+ 'style = "display:inline; width: 80px; height: 80px; margin-left: 20px">' + '<p name="name_food" style="display:inline; margin-right: 40px; margin-left: 15px">' + name_food + '</p>' + '<p style = "display:inline; margin-left:30px">x</p>' + '<p style="display:inline; name = "Last_quantity">' + quantity + '</p>' + '<p style="display:inline; margin-left: 30px">' + formatted_total_price + '</p>';
      
      let text = document.createElement("p");
      let line = document.createElement("hr");

      text.classList.add("text_price");
      text.setAttribute("name","Last_price");
      text.innerHTML = "Tổng cộng: " + formatted_total_price;
      totalBox.appendChild(line);
      totalBox.appendChild(text);

      //add value for input hidden -> to get value to insert into
      document.getElementById('name_food_input').value = name_food;
      document.getElementById('quantity_input').value = quantity;
      document.getElementById('price_input').value = total_price;

      // Exit the loop after finding the checked radio button
      break;
    }
  }
}




function submit_form()
{
// Get the form element
const form = document.getElementById('form_customer');
if (check_empty()) {
  // If validation succeeds, submit the form
  form.submit();
} else {
  // If validation fails, show error message or take appropriate action
  alert('Vui lòng điền đầy đủ thông tin.');
}
}
  

