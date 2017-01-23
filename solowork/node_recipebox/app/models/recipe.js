var mongoose = require('mongoose');

var recipeSchema = mongoose.Schema({
	ownerId: String,
	title: String,
	rating: String,
	description: String,
	ingredients: [String]
});

module.exports = mongoose.model('Recipe', recipeSchema);