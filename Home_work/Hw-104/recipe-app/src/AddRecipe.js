import React, { Component } from 'react';
import { Link } from 'react-router-dom';

export default class RecipeForm extends Component {
    constructor(props) {
        super(props);
        this.handleInputChange = this.handleInputChange.bind(this);

        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleInputChange(event) {
        const target = event.target;
        const value = target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }
    handleSubmit(event) {
        event.preventDefault();
        const recipe = { name: this.state.name, instructions: this.state.instructions, picture: 'something' };
        this.props.addRecipe(recipe);
    }

    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <label>Name:
                <input type="text" name="name" onChange={this.handleInputChange} required /></label>
                <label>Instructions
                    <input type="text" name="instructions" onChange={this.handleInputChange} required /></label>
                <input type="submit" value="Submit" />
            </form>
        );
    }
}