import Layout from "@/Components/common/layout";
import React, { useState } from "react";
import { Inertia } from '@inertiajs/inertia';



interface Props {

}

const BookmarkAddPage: React.FC<Props> = () => {
    const [state, setState] = useState({
        link: "",
        title: "Some Hardcoded Title"
    });

    const handleChange = (event:React.ChangeEvent<HTMLInputElement>) => {
        setState({...state,
            [event.currentTarget.name]: event.currentTarget.value })
    }

    const handleSubmit = (event: React.FormEvent<HTMLInputElement>) => {
        event.preventDefault()
        Inertia.post('/bookmark/preview',state)
    }

    return (
        <Layout>
            <div className="row">
                <div className="col-sm-8">
                    <form onSubmit={handleSubmit}>
                        <div className="form-group">
                            <label htmlFor="link">Link</label>
                            <input type="text" className="form-control" name="link" onChange={handleChange}/>
                        </div>
                    </form>

                </div>
            </div>
        </Layout>
    );
};

export default BookmarkAddPage;
