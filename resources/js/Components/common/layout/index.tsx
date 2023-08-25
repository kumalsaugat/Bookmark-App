import React, {ReactNode} from "react";
import Menu from "../nav";
interface Props {
    children: ReactNode;
}


const Layout:React.FC<Props> = ({ children }) => {
    return (
    <>
        <div className="mb-3">
            <Menu />
            <div className="container"> {children}</div>

        </div>
    </>
    );
};

export default Layout;
