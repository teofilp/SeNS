$(document).ready(function(){

	$("body").on('click', ".dashboard-link",(function(){

		//getting the reference to the clicked link
		var target = $(this).data('target');

		$("#panelInfo").load('views/' + target + ".php");
	}));

	//AJAX Request when the login button is clicked
	$('body').on('click', "#logInBtn" , function(event) {

		event.preventDefault();

		var username = $('#userName').val();
		var userPassword = $('#userPassword').val();

		if(username == '' || userPassword == '') {
		 	alert('PLease fill in all the gaps ');
		} else {

			$.ajax({
				url: '../php_scripts/login_script.php',
       			method: 'POST',
				data: {
					login: 1,
					username: username,
					password: userPassword
				},
     			 success: function(response) {
       			 $("#content").html(response);
       			},
     			dataType: 'text'
			});
		} //else end 
	}); //click end	

	//submit post
	$("body").on('submit', "#postsForm" , function(event){
		//preventing the form submision
		event.preventDefault();

		//setting the post category id
		var postCategoryId = $("#selectCategory option:selected").data("target");
		$("#postCategoryId").val(postCategoryId);

		var imageName = $("#postImage").val();
		var postTitle = $("#postTitle").val();
		var postAuthor = $("#postAuthor").val();
		var postTags = $("#postTags").val();
		var postCategory = $("#selectCategory").val();
		var postContent = $("#postContent").val();
		//the post's image name
		//chcking if the fields are filled
		//jquery validator
		if(postTitle == "" || postAuthor == "" || postTags == "" || postCategory == "" || imageName == "" || postContent == "") {
			alert("Va rugam sa completati toate campurile!");
		} else {

			 $.ajax({
			 	url: '../php_scripts/post_script.php',
			 	method:'POST',
			 	data: new FormData(this),
			 	contentType: false,
			 	cache: false,
			 	processData: false,
			 	success: function(response){
			 		$("#panelInfo").load("../views/syndicate-posts.php");
			 	},
			 	dataType: 'text'
			});
		}
	});


	$("body").on("submit", "#membersForm",function(event){

		event.preventDefault();

		//pull the data from the inputs
		var firstName = $("#firstName").val();
		var lastName = $("#memberName").val();
		var email = $("#memberEmail").val();
		var adeziune = $("#adeziune").val();
		var address = $("#memberAddress").val();
		var job = $("#memberJob").val();
		var jobPlace = $("#memberJobPlace").val();
		var memberCNP = $("#memberCNP").val();
		
		//checking if all the inputs had benn filled
		if(firstName=="" || lastName=="" || email=="" || adeziune=="" || address=="" || job=="" || jobPlace=="" || memberCNP == "") {
			alert("Va rugam sa completati toate campurile !");
		} else {

			//send the request to members_script.php
			$.ajax({
				url: '../php_scripts/members_script.php',
				method: 'POST',
				data: {
					memberSubmited: 1,
					firstName: firstName,
					lastName: lastName,
					email: email,
					adeziune: adeziune,
					address: address,
					job:job,
					job_place: jobPlace,
					memberCNP: memberCNP
				},
				success: function(response) {
					console.log(response);
					$("#memberTableBody").html(response);
				},
				dataType: 'text'
			});
		}	
	});

	$("body").on('submit', "#adminsForm", function(event){

		event.preventDefault();

		var adminUserName = $("#newAdminUserName").val();
		var adminPassword = $("#newAdminPassword").val();
		var adminFirstName = $("#newAadminFirstName").val();
		var adminSecondName = $("#newAdminSecondName").val();

		//checking for the data to be complete
		if(adminUserName == "" || adminPassword == "") {
			alert("Va rugam sa completati toate campurile !");
		} else {

			//sending the request
			$.ajax({
				url: '../php_scripts/admin_script.php',
				method: 'POST',
				data: {
					adminAdded: 1,
					adminUserName: adminUserName,
					adminPassword: adminPassword,
					adminFirstName: adminFirstName,
					adminSecondName: adminSecondName
				},
				success: function(response) {
					$("#panelInfo").load("../views/syndicate-admins.php");
				},
				dataType: 'text'
			});
		}
 	});

 	$("body").on('submit', '#categoriesForm', function(event){

 		event.preventDefault();
 		
 		var categoryName = $("#postCategory").val();
 		//validating input
 		if(categoryName == "") {
 			alert("Va rugam sa completati toate campurile !");
 		} else {

 			//sending the request
 			$.ajax({
 				url: '../php_scripts/categories_script.php',
 				method: 'POST',
 				data: {
 					categoryAdded: 1,
 					categoryName: categoryName
 				},
 				success: function(response) {
 					$("#panelInfo").load("../views/syndicate-categories.php");
 				},
 				dataType: 'text'
 			});
 		}
 	});

 	//deleting elements from database
 	$("body").on('click', ".btn-danger", function(event) {

 		event.preventDefault();
 		
 		//getting the type adn the id of the data that is deleted
 		var deletedDataType = $(this).data('target');
 		var deletedRowId = $(this).val(); 

 		//deleting data based on deletedDataType
 		if(deletedDataType == "admin") {

 			$.ajax({
 				url: '../php_scripts/admin_script.php',
 				method: 'POST',
 				data: {
 					adminDeleted: 1,
 					adminId: deletedRowId
 				},
 				success: function(response) {
 					$("#panelInfo").load("../views/syndicate-admins.php");
 				},
 				dataType: 'text'
 			});
 		} else if(deletedDataType == "post") {

 			$.ajax({
 				url: '../php_scripts/post_script.php',
 				method: 'POST',
 				data: {
 					deletedPost: 1,
 					postId: deletedRowId
 				},
 				success: function(response) {
 					$("#panelInfo").load("../views/syndicate-posts.php");
 				},
 				dataType: 'text'
 			});
 		} else if(deletedDataType == "member") {

 			$.ajax({
 				url: '../php_scripts/members_script.php',
 				method: 'POST',
 				data: {
 					deletedMember: 1,
 					memberId: deletedRowId
 				},
 				success: function(response) {
 					$("#panelInfo").load("../views/syndicate-members.php");
 				},
 				dataType: 'text'
 			});
 		}
 	});
});	
