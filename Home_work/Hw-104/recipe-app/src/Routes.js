import React, { Component } from 'react';
import { Switch, Route, Redirect } from 'react-router-dom';
import RecipeBook from './RecipeBook';
import RecipeForm from './AddRecipe';
import RecipeList from './RecipeList';

/*const Routes = (
    <div>
        <Route path="/" exact component={App} />
        <Route path="/app" component={App} />
    </div>
);*/



const Routes = (
    <Switch>
        <Route path="/RecipeBook" component={RecipeBook} />
        <Route path="/RecipeList" component={RecipeList} />
        <Route path="/RecipeForm" component={RecipeForm} />
        <Redirect exact from="/" to="/RecipeBook" />

    </Switch>
);

export default Routes;