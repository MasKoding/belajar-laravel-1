import React, { useEffect, useState }  from "react";
import Layout from "../../Layouts/Default";
import { Inertia } from "@inertiajs/inertia";


export default function Edit({errors,product}){
    const [name,setName] = useState(product.name)
    const [category,setCategory] = useState(product.category)
    const [price,setPrice] = useState(product.price)
    const [qty,setQty] = useState(product.qty)
    const [total,setTotal]  =useState(product.price*product.qty)
    const [image,setImage] = useState(product.image);
    const [preview, setPreview] = useState(product.image ? `/storage/${product.image}` : null);

    const updateProduct = async(e)=>{
        e.preventDefault()

        const formData = new FormData();
        formData.append("name", name);
        formData.append("category", category);
        formData.append("price", price);
        formData.append("qty", qty);

        if (image) {
            formData.append("image", image); // Append only if an image is selected
        }
        Inertia.put(`/products/${product.id}`,formData,{
            headers: {
                'content-type': 'multipart/form-data'
            },
            onError: (errors) => {
                console.log(errors)
            }
        })

    }

    const handleImageChange = (e) => {
        const selectedFile = e.target.files[0];
        if (selectedFile) {
            setImage(selectedFile);
            setPreview(URL.createObjectURL(selectedFile));
        }
    };

    useEffect(() => {
        // Cleanup generated object URL when the component unmounts or `preview` changes
        return () => {
            if (image) {
                URL.revokeObjectURL(preview);
            }
        };
    }, [preview, image]);
    const handleQty = (e)=>{
        const newQty = e.target.value;
        setQty(newQty)
        setTotal(newQty*price)

    }
    const handlePrice = (e)=>{
        const newPrice = e.target.value
        setPrice(newPrice)
        setTotal(qty*newPrice)

    }
    return (
        <Layout>
            <div className="row" style={{ marginTop: '100px' }}>
                <div className="col-12">
                    <div className="card border-0 rounded shadow-sm border-top-success">
                        <div className="card-header">
                            <span className="font-weight-bold">TAMBAH PRODUCTS</span>
                        </div>
                        <div className="card-body">
                            <form onSubmit={updateProduct}>

                                <div className="mb-3">
                                    <label className="form-label fw-bold">Name</label>
                                    <input type="text" className="form-control" value={name} onChange={(e) => setName(e.target.value)} placeholder="Masukkan Product Name" />
                                </div>
                                {errors.name && (
                                    <div className="alert alert-danger">
                                        {errors.name}
                                    </div>
                                )}

<div className="mb-3">
                                    <label className="form-label fw-bold">Category</label>
                                    <input type="text" className="form-control" value={category} data-role="tags-input" onChange={(e) => setCategory(e.target.value)} placeholder="Masukkan Category " />
                                </div>
                                {errors.category && (
                                    <div className="alert alert-danger">
                                        {errors.category}
                                    </div>
                                )}

<div className="mb-3">
                                    <label>Upload Image</label>
                                    <input type="file" accept="image/*" className="form-control" onChange={handleImageChange} />
                                    {preview && (
                                        <img src={preview} style={{ width: '300px', height: '300px' }} />
                                    )}

                                    {errors.image && (
    <div className="alert alert-danger mt-2">{errors.image}</div>
)}

                                </div>
                                <div className="mb-3">
                                    <label className="form-label fw-bold">Price</label>
                                    <input type="text" className="form-control" value={price} onChange={handlePrice} placeholder="Masukkan Price " />
                                </div>
                                {errors.price && (
                                    <div className="alert alert-danger">
                                        {errors.price}
                                    </div>
                                )}



                                <div className="mb-3">
                                    <label className="form-label fw-bold">Quantity</label>
                                    <input type="number" className="form-control" value={qty} onChange={handleQty} placeholder="Masukkan Quantity " />
                                </div>
                                {errors.qty && (
                                    <div className="alert alert-danger">
                                        {errors.qty}
                                    </div>
                                )}
                                <div className="mb-3">
                                    <label className="form-label fw-bold">Total</label>
                                    <input type="number" disabled={true} value={total}  className="form-control"  placeholder="Total " />
                                </div>
                                <div>
                                </div>


                                <div>
                                    <button type="submit" className="btn btn-md btn-success me-2"><i className="fa fa-save"></i> SAVE</button>
                                    <button type="reset" className="btn btn-md btn-warning"><i className="fa fa-redo"></i> RESET</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    )
}


