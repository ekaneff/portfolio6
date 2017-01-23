var express = require('express');
var router = express.Router();
var path = require('path');
var fs = require('fs');
var mongoose = require('mongoose');

//put models here
var User = mongoose.model('User');
var Recipe = mongoose.model('Recipe');

module.exports = function(app) {
	app.use('/user', router);
}

//user registration
router.get('/register', function(req, res, next) {
	res.render('user/register', {'login': req.session.login});
});

router.post('/register', function(req, res, next) {
	var user = new User({
		name: req.body.name,
		username: req.body.username,
		email: req.body.email,
		password: req.body.password
	});

	user.validate(function(err) {
		console.log(err);
	});

	console.log(user);

	user.save(function(err, newUser) {
		req.session.name = user.name;
		req.session.login = true;
		req.session.userId = newUser._id;
		res.redirect('/user/profile');
	});
});

//user login
router.get('/login', function(req, res, next) {
	res.render('user/login', {'login': req.session.login});
});

router.post('/login', function(req, res, next) {
	User.find({username: req.body.username}, function(err, user) {
		//console.log(user);
		req.session.name = user[0].name;
		req.session.login = true;
		req.session.userId = user[0]._id;
		res.redirect('/user/profile');
	});
});

//user profile
router.get('/profile', function(req, res, next) {
	//console.log(req.session.login);
	if(req.session.login) {
		Recipe.find({ownerId: req.session.userId}, function(err, recipes) {
			console.log(recipes);
			res.render('user/profile', {name: req.session.name, login: req.session.login, userId: req.session.userId, recipes: recipes});
		});
	} else {
		res.redirect('/');
	}
});

//user logout
router.get('/logout', function(req, res, next) {
	req.session.destroy(function(err) {
		res.redirect('/');
	});
});
