import React, { Component } from 'react';

export default class MyForm extends Component {
    constructor(props) {
        super(props);
        //this.state = { value: "" };
        this.state = { name: "", email: "" };
    }

    /*handleChange = (e) => {
        this.setState({ value: e.target.value });
    }*/

    handleInputChange = (event) => {
        const target = event.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;

        /*let stateChange = {}
        stateChange[name] = value;
        this.setState(stateChange);*/
        this.setState({
            [name]: value
        });
    }

    handleSubmit = (e) => {
        //alert('A name was submitted: ' + this.state.value);
        console.log("You submitted", this.state.name, this.state.email);
        e.preventDefault();
    }

    render() {
        return (
            <form onSubmit={this.handleSubmit} >
                <label>
                    Name:
                    <input type="text" name="name" value={this.state.name} onChange={this.handleInputChange} />
                </label>
                <label>
                    Email:
                    <input type="email" name="email" value={this.state.email} onChange={this.handleInputChange} />
                </label>
                <input type="submit" value="Submit" />
            </form>
        );
    }
}