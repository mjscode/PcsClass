import React, { Component } from 'react';

export default class Welcome extends Component {
    constructor(props) {
        super(props);
        this.state = {
            temperature: 78
        };

        setInterval(() => this.setState({ temperature: this.state.temperature + 1 }), 1000);
    }

    render() {
        return (
            <div>
                <h1>Im a component. Hello {this.props.name}</h1>
                <h2>The temperature in here is approximately {this.state.temperature}</h2>
            </div>
        );
    }
}