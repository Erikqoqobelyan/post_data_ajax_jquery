<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQo-L0nC3n-WQcvuf7GNrTuWJsuIxZapBx-cA&usqp=CAU">
    <title>API Data</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        font-family: "Inter", sans-serif;
      }
      .formbold-main-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px;
      }

      .formbold-form-wrapper {
        border: 1px solid #b9b2b2;
        margin: 0 auto;
        max-width: 550px;
        width: 100%;
        background: white;
        padding: 11px;
      }

      .formbold-input-flex {
        display: flex;
        gap: 20px;
        margin-bottom: 22px;
      }
      .formbold-input-flex > div {
        width: 50%;
        display: flex;
        flex-direction: column-reverse;
      }
      .formbold-textarea {
        display: flex;
        flex-direction: column-reverse;
      }

      .formbold-form-input {
        width: 100%;
        padding-bottom: 10px;
        border: none;
        border-bottom: 1px solid #DDE3EC;
        background: #FFFFFF;
        font-weight: 500;
        font-size: 16px;
        color: #07074D;
        outline: none;
        resize: none;
      }
      .formbold-form-input::placeholder {
        color: #536387;
      }
      .formbold-form-input:focus {
        border-color: #6A64F1;
      }
      .formbold-form-label {
        color: #07074D;
        font-weight: 500;
        font-size: 14px;
        line-height: 24px;
        display: block;
        margin-bottom: 18px;
      }
      .formbold-form-input:focus + .formbold-form-label {
        color: #6A64F1;
      }

      .formbold-input-file {
        margin-top: 30px;
      }
      .formbold-input-file .formbold-input-label {
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
      }
      .formbold-btn {
        font-size: 16px;
        border-radius: 5px;
        padding: 12px 25px;
        border: none;
        font-weight: 500;
        background-color: #6A64F1;
        color: white;
        cursor: pointer;
        margin-top: 25px;
      }
      .formbold-btn:hover {
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
      }
    </style>
</head>
<body>
    <div class="formbold-main-wrapper">
      <div class="formbold-form-wrapper">
        <form id="myForm">
            <div class="formbold-input-flex">
              <div>
                  <input
                  type="text"
                  name="firstname"
                  id="firstname"
                  placeholder="First Name"
                  class="formbold-form-input"
                  required
                  />
                  <label for="firstname" class="formbold-form-label"> First name </label>
              </div>
              <div>
                  <input
                  type="text"
                  name="lastname"
                  id="lastname"
                  placeholder="Last Name"
                  class="formbold-form-input"
                  required
                  />
                  <label for="lastname" class="formbold-form-label"> Last name </label>
              </div>
            </div>

            <div class="formbold-input-flex">
              <div>
                  <input
                  type="email"
                  name="email"
                  id="email"
                  placeholder="Email"
                  class="formbold-form-input"
                  required
                  />
                  <label for="email" class="formbold-form-label"> Email </label>
              </div>
              <div>
                  <input
                  type="text"
                  name="phone"
                  id="phone"
                  placeholder="Phone"
                  class="formbold-form-input"
                  required
                  />
                  <label for="phone" class="formbold-form-label"> Phone </label>
              </div>
            </div>
            <button class="formbold-btn" type="submit">
                Send Data
            </button>
        </form>
      </div>
    </div>

    <div id="append_data">  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#myForm").submit(function (event) {
        event.preventDefault();
        var formData = {
          firstname: $("#firstname").val(),
          lastname: $("#lastname").val(),
          email: $("#email").val(),
          phone: $("#phone").val()
        };
        $.ajax({
          type: "POST",
          url: "https://jsonplaceholder.typicode.com/users",
          data: formData,
          dataType: "json",
          success: function (response) {
            $("#append_data").append("First Name = " + response.firstname + '<br />');
            $("#append_data").append("Last Name = " + response.lastname + '<br />');
            $("#append_data").append("Email = " + response.email + '<br />');
            $("#append_data").append("Phone = " + response.phone + '<br />' + '<br />');
          },
          error: function (xhr, status, error) {
            console.log("Error: " + error);
          }
        });
      });
    });
  </script>
</body>
</html>
