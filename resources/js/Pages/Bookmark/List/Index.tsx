import Layout from "@/Components/common/layout";
import { InertiaLink } from "@inertiajs/inertia-react";
import React from "react";

interface Props {
    bookmarks: Array<any>;
}

const BookmarkListPage: React.FC<Props> = ({ bookmarks }) => {
    return (
        <Layout>
            <div className="row">
                <div className="col-sm-8">
                    <ul className="list-group">
                        {bookmarks.length > 0 &&
                            bookmarks.map((bookmark, index) => {
                                return (
                                    <li className="list-group-item" key={index}>
                                        <div>
                                            <InertiaLink href={route('bookmark.view', {bookmark:bookmark.id})}>{bookmark.title}</InertiaLink>
                                            <br />
                                            <span>{bookmark.description}</span>

                                        </div>
                                    </li>
                                );
                            })}
                    </ul>
                </div>
            </div>
        </Layout>
    );
};

export default BookmarkListPage;
