document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission
  
    // Get form values
    var name = document.getElementById("name").value;
    var age = document.getElementById("age").value;
    var weight = document.getElementById("weight").value;
    var email = document.getElementById("email").value;
    var report = document.getElementById("report").files[0]; // Get the selected file
  
    // Create a FormData object to send form data and file
    var formData = new FormData();
    formData.append("name", name);
    formData.append("age", age);
    formData.append("weight", weight);
    formData.append("email", email);
    formData.append("report", report);
  
    // Send the form data to the PHP file using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_data.php", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Handle the response here if needed
        console.log(xhr.responseText);
      }
    };
    xhr.send(formData);
  });
  