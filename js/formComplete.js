$(document).ready(function () {
    $("#county").hide();
    $("#town").hide();
    $("#countyLabel").hide();
    $("#townLabel").hide();

    $("#country2").keyup(function () {
        var letters = $("#country2").val(); //Text being typed into box
        var country = $("#country").val(); //Country ID

        $.ajax({
            url: "includes/autoComplete.php", //page that the info is being passed to
            type: "post",
            data: {"letters": letters, "country": country}, //Pass letters and country variables to autoComplete.php
            success: function (data) {
                var letterArr = jQuery.parseJSON(data);
                $("#country").empty(); //empty datalist to avoid duplicate counties
                
                for (var key in letterArr) //for each element in the array...
                {
                    $("#country").append(new Option(key, letterArr[key])); //... add a new option to the datalist
                }
            },
            error: function (data) {
                alert("There was an error with ajax");
            }
        });
    });

    $("#country2").change(function () { //When the user picks a country from the datalist
        $("#county").show();
        $("#countyLabel").show();
        var country = $("#country").text();

        $.ajax({
            url: "includes/formComplete.php", //page that the info is being passed to
            type: "post",
            data: {"country": country}, //Pass country variable to formComplete.php
            success: function (data) {
              
                var countyArr = jQuery.parseJSON(data);
                $("#county").empty();

                for (var key in countyArr) //For each element in townArr...
                {
                    $("#county").append(new Option(key, countyArr[key])); //... add a new option to the select
                }
            },
            error: function (data) {
                $("#text").append("error");
            }
        });
    });

    $("#county").change(function () {
        $("#town").show();
        $("#townLabel").show();
        var county = $("#county").val();

        $.ajax({
            url: "includes/townComplete.php", //page that the info is being passed to
            type: "post",
            data: {"county": county}, //Pass county info to townComplete.php
            success: function (data) {
                var townArr = jQuery.parseJSON(data);
                $("#town").empty();
                
                for (var key in townArr) {
                    $("#town").append(new Option(key, townArr[key]));
                }
            },
            error: function (data) {
                $("#text").append("error");
            }
        });
    });
});
