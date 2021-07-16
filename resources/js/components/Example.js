import React from 'react';
import ReactDOM from 'react-dom';
import axios from "axios";
class Example extends React.Component{
    constructor() {
        super();
        this.state = {
            products:[],
            shippingFee:0,
            grandTotal:0
        }
    }
    componentDidMount() {
        axios.get("/product-list").then(rs=>{
           this.setState({
               products: rs.data.products
           })
        });
    }

    checkOut(){
        // gui thong tin checkout len
    }

    render() {
        const products = this.state.products;
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">
                                <ul>
                                    {
                                        products.map(function (e,k){
                                            return <li key={k}>{e.name}</li>
                                        })
                                    }
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Example;

if (document.getElementById('app')) {
    ReactDOM.render(<Example />, document.getElementById('app'));
}
