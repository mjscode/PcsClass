import React, { Component } from 'react';

export default class Counter extends Component {
    constructor(props) {
        super(props);
        this.state = { clicks: 0 };
        //this.handleClick = this.handleClick.bind(this);
    }

    /*handleClick() {
        console.log("Button was clicked");
        console.log(this);
        this.setState({ clicks: this.state.clicks + 1 });
    }*/

    handleClick = () => {
        console.log("Button was clicked");
        console.log(this);
        this.setState({ clicks: this.state.clicks + 1 });
    }

    render() {
        // <button onClick={this.handleClick}>Click Me! {this.state.clicks}</button>
        // <button onClick={(e) => this.handleClick(e)}> Click Me! {this.state.clicks}</button >
        return (
            <button onClick={this.handleClick}> Click Me! {this.state.clicks}</button >
        )
    }
}