import React, { Component } from 'react';

/*class Student extends Component {
    render () {
        return (
            <div>Im a student</div>
        );
    }
}*/

/*function Student(props) {
    return (
        <div>Im a student</div>
    );
}*/

const Student = (props) => {
    const { name, marks } = props.student;
    const markElements = /*props.student.*/marks.map((m, i) => <li key={i}>{m}</li>);

    const style = {
        padding: "20px",
        textAlign: "center",
        color: "Red",
        backgroundColor: props.color
    };

    return (
        <div style={style}>
            <h2>{/*props.student.*/name}</h2>
            <ul>{markElements}</ul>
        </div>
    );
}

export default Student;