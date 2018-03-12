import React, { Component } from 'react';
import RecipeList from './RecipeList';
import RecipeForm from './AddRecipe';
import { Switch, Route, Redirect } from 'react-router-dom';
import { Link } from 'react-router-dom';

export default class RecipeBook extends Component {
    constructor(props) {
        super(props);
        this.state = {
            recipes: [
                { name: 'Macaroni', instructions: 'Boil water, add macaroni', picture: 'macaroni.jpg' },
                { name: 'Eggs', instructions: 'Boil water, add eggs', picture: 'eggs.jpg' }
            ]
        };
    }
    addRecipe(object) {
        this.setState({ recipes: this.state.recipes.concat(object) });
    }


    render() {
        const Routes = (
            <Switch>
                <Route path="/RecipeList" render={() => <RecipeList recipes={this.state.recipes} />} />
                <Route path="/RecipeForm" render={() => <RecipeForm addRecipe={this.addRecipe.bind(this)} />} />

            </Switch>
        );
        return (
            <div>
                <Link to="/RecipeForm">add recipe</Link> | <Link to="/RecipeList">recipe list</Link>

                <hr />
                {Routes}
            </div>

        );
    }
}

