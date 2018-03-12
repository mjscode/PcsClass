import React, { Component } from 'react';

export default class Clock extends Component {
    constructor(props) {
        super(props);
        this.state = { time: new Date() };
    }

    componentDidMount() {
        this.interval = setInterval(() => this.setState({ time: new Date() }), 1000);
        console.log('componentDidMount');
    }

    componentWillUnmount() {
        clearInterval(this.interval);
        console.log('componentWillUnmount');
    }

    render() {
        return (
            <div>
                <h1>PCS Clock</h1>
                <h2>The time time is now {this.state.time.toLocaleTimeString()}</h2>
            </div>
        );
    }
}