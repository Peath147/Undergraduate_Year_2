package CSS2103;

class BST{
    public Node root; // References the root node of the BST

    public BST(){
        root = null;
    }

    public Node myParent;

    public static void main(String[] args) {
        BST x = new BST();
        x.put( 6, "a",50 );
        x.put( 4, "b",43 );
        x.put( 3, "c",20 );
        x.put( 5, "d",80 );
        x.put( 8, "e",50 );
        x.put( 9, "g",43 );
        x.put( 7, "f",20 );

        x.printBST();
/*
        System.out.println("Remove *************************");
        System.out.println("*** remove 7 ***");
        x.remove( 7 );
        x.printBST();

        System.out.println("Remove *************************");
        System.out.println("*** remove 6 ***");
        x.remove( 6 );
        x.printBST();
*/
        t2(x.root);
    }
    static void t1(Node x){
        if (x != null){
            System.out.print(x.name);
            t1(x.left);
            t1(x.right);
            System.out.print(x.name);
        }
    }

    static void t2(Node x){
        if (x != null){
            System.out.print(x.name);
            t1(x.right);
            t1(x.left);
        }
    }

    public Node findNode(int x){
        Node curr_node;
        Node prev_node;

        curr_node = root;
        prev_node = root;

        while ( curr_node != null )
        {
            if ( x == curr_node.id )
            {
                myParent = prev_node;
                return curr_node;
            }
            else if ( x < curr_node.id  )
            {
                prev_node = curr_node;
                curr_node = curr_node.left;
            }
            else
            {
                prev_node = curr_node;
                curr_node = curr_node.right;
            }
        }

        myParent = prev_node;
        return null;
    }

    public void put(int x,String N,int S){
        Node p;

        if ( root == null ) {

            root = new Node( x,N,S );
            return;
        }

        p = findNode(x);

        if ( p != null ) {
            return;
        }

        Node q = new Node( x,N,S );

        if ( x < myParent.id )
            myParent.left = q;
        else
            myParent.right = q;
    }

    public void remove(int x) {
        Node p;
        Node parent;
        Node succ;

        p = findNode(x);

        if ( p == null )
            return;

        if ( p.left == null && p.right == null )
        {
            if ( p == root )
            {
                root = null;
                return;
            }

            parent = myParent;

            if ( parent.left == p )
                parent.left = null;
            else
                parent.right = null;

            return;
        }

        if ( p.left == null )
        {
            if ( p == root )
            {
                root = root.right;
                return;
            }

            parent = myParent;

            if ( parent.left == p )
                parent.left = p.right;
            else
                parent.right = p.right;

            return;
        }

        if ( p.right== null )
        {
            if ( p == root )
            {
                root = root.left;
                return;
            }

            parent = myParent;

            if ( parent.left == p )
                parent.left = p.left;
            else
                parent.right = p.left;

            return;
        }

        if ( p.right.left == null )
        {
            p.id = p.right.id;
            p.right = p.right.right;

            return;
        }

        succ = p.right;
        Node succParent = p;

        while ( succ.left != null )
        {
            succParent = succ;
            succ = succ.left;
        }

        p.id = succ.id;
        succParent.left = succ.right;
    }

    public void printnode(Node x, int h) {
        for (int i = 0; i < h; i++)
            System.out.print("             ");

            System.out.println("[" + x.toString() + "]");
    }

    void printBST() {
        showR( root, 0 );
        System.out.println("================================");
    }

    public void showR(Node t, int h) {
        if (t == null)
            return;

        showR(t.right, h+1);
        printnode(t, h);
        showR(t.left, h+1);
    }

    public class Node{

        public Node left;
        public int id;
        public String name;
        public int score;
        public Node right;


        public Node( int x, String N, int S){
            left = null;
            id = x;
            name = N;
            score = S;
            right = null;
        }

        public String toString(){
            return +id+" "+name+" "+score;
        }
    }
}