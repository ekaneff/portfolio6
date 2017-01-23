var express = require('express');
var router = express.Router();
var path = require('path');
var fs = require('fs');
var mongoose = require('mongoose');

//put models here
var Recipe = mongoose.model('Recipe');
var User = mongoose.model('User');

//functions
module.exports = function(app) {
	app.use('/', router);
	app.set('view engine', 'pug');
	app.set('views', './app/views');

	app.get('/', function(req, res, next) {
		res.render('index', {'login': req.session.login, name: req.session.name});
	});
}

//load new recipe form
router.get('/create', function(req, res, next) {
	if(req.session.login){
		//console.log(req.session.userId);
		res.render('recipe/create', {userId: req.session.userId});
	} else {
		res.redirect('/');
	}
});

//save recipe to database
router.post('/save', function(req, res, next) {
	if(req.session.login){
		var ingrs = req.body.ingredients.split('\r\n');
		
		var recipe = new Recipe({
			ownerId: req.body.id,
			title: req.body.title,
			rating: req.body.rating,
			description: req.body.description,
			ingredients: ingrs
		});

		recipe.validate(function(err) {
			console.log(err);
		});

		recipe.save(function(err) {
			res.redirect('/user/profile');
		});

	} else {
		res.redirect('/');
	}
});

//show recipe details page
router.get('/recipe/:id', function(req, res, next) {
	if(req.session.login) {
		Recipe.find({_id: req.params.id}, function(err, recipe) {
			res.render('recipe/details', {recipe: recipe[0], login: req.session.login, name: req.session.name});
		});
	} else {
		res.redirect('/');
	}
	
});

//show edit form
router.get('/edit/:id', function(req, res, next) {
	if(req.session.login) {
		Recipe.find({_id: req.params.id}, function(err, recipe) {
			var ingrs = recipe[0].ingredients.toString();
			//console.log(ingrs);
			var ingrsString = ingrs.replace(/,/g, '\n');
			res.render('recipe/edit', {recipe: recipe[0], ingrs: ingrsString, login: req.session.login, userId: req.session.userId});
		});
	} else {
		res.redirect('/');
	}
});

//update recipe
router.post('/update', function(req, res, next) {
	var ingrs = req.body.ingredients.split('\r\n');
	Recipe.update({_id: req.body._id}, {$set: {title: req.body.title, rating: req.body.rating, description: req.body.description, ingredients: ingrs}}, function(err, recipe) {
		res.redirect('/user/profile');
	});
});

//delete recipe
router.get('/delete/:id', function(req, res, next) {
	if(req.session.login) {
		Recipe.remove({_id: req.params.id}, function(err) {
			if (err) {
				console.log(err);
			}
		});
		res.redirect('/user/profile');
	} else {
		res.redirect('/');
	}
});

