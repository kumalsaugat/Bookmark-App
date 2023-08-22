import React, {ReactNode} from "react";

interface Props {
    children: ReactNode;
}


const Layout:React.FC<Props> = ({ children }) => {
    return <div className="container">{children}</div>
};

export default Layout;
