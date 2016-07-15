# Model

Manipulating array data in most cases can be expressed as a model. Models in *Eden* is defined loosely and as a utility class to help managing data in a controlled and chainable format. The basic setup of a model is described in `Figure 1`.

**Figure 1. Setup**

	$user = array(
		'user_name' => 'Chris',
		'user_email' => 'cblanquera@openovate.com',
		'user_location' => 'Manila, Philippines');
	
	eden('model', $user);

From here we can access properties in our model as a method, property or back as an array. `Figure 2` shows the ways to access data in action.

**Figure 2. Accessing Model Properties**
	//set user name
	$model->setUserName('Chris');            
	
	// returns user email
	$model->getUserEmail();                  
	
	// set any abstract key
	$model->setAnyThing('somthing');
	
	// get any abstract key
	$model->getAnyThing();              	
	 
	//access as array
	echo $model['user_name'];
	
	//set as array
	$model['user_email'] = 'my@email.com';
	
	//access as object
	echo $model->user_name;  
	
	//set as object
	$model->user_name = 'my@email.com';    

Models in *Eden* extend `Eden\Type\ArrayType` which means that you can also apply basic PHP array functions. `Figure 3` shows some of the many things you can do with models regarding array functions.

**Figure 3. Array Methods**

	$model->changeKeyCase();
	$model->chunk();
	$model->combine();
	$model->countDatas();
	$model->diffAssoc();
	$model->diffKey();
	$model->diffUassoc();
	$model->diffUkey();
	$model->diff();
	$model->fillKeys();
	$model->filter();
	$model->flip();
	$model->intersectAssoc();
	$model->intersectKey();
	$model->intersectUassoc();
	$model->intersectUkey();
	$model->intersect();
	$model->keys();
	$model->mergeRecursive();
	$model->merge();
	$model->pad();
	$model->reverse();
	$model->shift();
	$model->slice();
	$model->splice();
	$model->sum();
	$model->udiffAssoc();
	$model->udiffUassoc();
	$model->udiff();
	$model->uintersectAssoc();
	$model->uintersectAassoc();
	$model->uintersect();
	$model->unique();
	$model->datas();
	$model->count();
	$model->current();
	$model->each();
	$model->end();
	$model->extract();
	$model->key();
	$model->next();
	$model->prev();
	$model->sizeof();
	$model->fill();
	$model->map();
	$model->search();
	$model->compact();
	$model->implode(' '); //returns Eden_Type_String
	$model->in_array();
	$model->unshift();
	$model->walkRecursive();
	$model->walk();
	$model->arsort();
	$model->asort();
	$model->krsort();
	$model->ksort();
	$model->natcasesort();
	$model->natsort();
	$model->reset();
	$model->rsort();
	$model->shuffle();
	$model->sort();
	$model->uasort();
	$model->uksort();
	$model->usort();
	$model->push();

Most of these methods may or may not be applicable as far as a model is concerned, but you can still use it as you see fit. On top of these methods we added several common methods to futher manipulate model data.

**Figure 4. Utility Methods**

	//for each row, copy the value of post_user to the user_id column
	$model->copy('post_user', 'user_id');
	
	//returns a raw array (no object)
	$model->get();  

====

#Contributing to Eden

##Setting up your machine with the Eden repository and your fork

1. Fork the main Eden repository (https://github.com/Eden-PHP/Model)
2. Fire up your local terminal and clone the *MAIN EDEN REPOSITORY* (git clone git://github.com/Eden-PHP/Model.git)
3. Add your *FORKED EDEN REPOSITORY* as a remote (git remote add fork git@github.com:*github_username*/Model.git)

##Making pull requests

1. Before anything, make sure to update the *MAIN EDEN REPOSITORY*. (git checkout master; git pull origin master)
2. If PHP Unit testing is included in this package please make sure to update it and run the test to ensure everything still works (phpunit)
3. Once updated with the latest code, create a new branch with a branch name describing what your changes are (git checkout -b bugfix/fix-twitter-auth)
    Possible types:
    - bugfix
    - feature
    - improvement
4. Make your code changes. Always make sure to sign-off (-s) on all commits made (git commit -s -m "Commit message")
5. Once you've committed all the code to this branch, push the branch to your *FORKED EDEN REPOSITORY* (git push fork bugfix/fix-twitter-auth)
6. Go back to your *FORKED EDEN REPOSITORY* on GitHub and submit a pull request.
7. An Eden developer will review your code and merge it in when it has been classified as suitable.