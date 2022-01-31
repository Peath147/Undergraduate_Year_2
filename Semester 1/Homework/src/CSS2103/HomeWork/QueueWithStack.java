package CSS2103.HomeWork;

public class QueueWithStack {
    public static void main(String[] args) {
        Queue q = new Queue();
        q.enQueue(1);
        q.enQueue(2);
        q.enQueue(3);

        System.out.println();
        System.out.println("dequeue : "+q.deQueue());
        System.out.println("dequeue : "+q.deQueue());
        System.out.println("dequeue : "+q.deQueue());

    }

    static class Queue {
        // การทำ queue ด้วย stack เราจะสร้าง stack ขึ้นมา 2 stack โดนเราไว้สำหรับ พักข้อมูล 1 stack
        // เช่น ถ้าเรานำ 1 2  enqueue ตามลำดับ
        //
        //        enqueue 1
        //  stack 1  |  stack 2   |
        //           |            |
        //           |            |
        //           |            |
        //           |            |
        //      1    |            |

        //       enqueue 2 เมื่อมีข้อมูลใน stack 1 จะย้ายของใน stack 1 ลง stack 2
        //  stack 1  |  stack 2  |
        //           |           |
        //           |           |
        //           |           |
        //           |           |
        //           |     1     |

        //       enqueue 2 จากนั้นนำข้อมูลลงstack 1
        //  stack 1  |  stack 2  |
        //           |           |
        //           |           |
        //           |           |
        //           |           |
        //      2    |     1     |

        //       push 2 แล้วนำข้อมูลทั้งหมดจาก stack 2 มา stack 1
        //  stack 1  |  stack 2  |
        //           |           |
        //           |           |
        //           |           |
        //      1    |           |
        //      2    |           |
        // ที่นี้เวลาเรา pop เราก็จะได้เลข 1 ที่ push เข้าไปก่อน ตามแบบ queue FIFO

        static StackUsingLinkedlist s1 = new StackUsingLinkedlist();
        static StackUsingLinkedlist s2 = new StackUsingLinkedlist();

        static void enQueue(int x) {
            while (!s1.isEmpty()) //วนลูปนำค่าใน stack แรก pop ไปอยู่ stack 2 ทั้งหมดเพื่อเตรียมพื้นที่ไว้สำหรับ push ข้อมูลลง stack1
            {
                s2.push(s1.pop()); //นำข้อมูลที่ pop ออกจาก stack 1 ลง stack 2
            }

            s1.push(x); //นำข้อมูลเข้า stack 1
            System.out.println("enqueue : "+x);

            while (!s2.isEmpty()) // จากนั้นให้วนลูปนำข้อมูลจาก stack 2 ที่เราพักไว้ให้ pop กลับมา stack 1 ทั้งหมด
            {
                s1.push(s2.pop()); //นำข้อมูลที่ pop ออกจาก stack 2 ลง stack 1
            }
        }

        static Object deQueue()
        {
            if (s1.isEmpty())
            {
                System.out.println("Q is Empty");
                System.exit(0);
            }

            Object x = s1.peek();// นำข้อมูลบนสุดไว้ใน x
            s1.pop(); // pop ค่าบนออก
            return x; // return ค่า x
        }
    }

    static class StackUsingLinkedlist {
        //
        Node top; // สร้างตัวแปรโหลดไว้เก็บ addess ค่าบนสุดของ Stack
        //  รูปของ Stack คือ
        private class Node { // สร้างLinklist node
            Object data; // ตัวแแปร Object ไว้เก็บข้อมูล
        Node link; // ตัวแปรโหนดไว้เก็บ addess
        }
        //
        StackUsingLinkedlist()
        {
            this.top = null; //กำหนดค่าว่าค่าบนสุดเป็น null
        }
        //
        public void push(Object x) { //push สำหรับ push ข้อมูลเข้าไปในstack
            Node temp = new Node(); //สร้าง Linklist ไว้สำหรับเก็บข้อมูล stack (ทำการสร้างใหม่ทุกครั้งที่เรียกใช้)
            //แต่ละ linklist จะเก็บค่า2ค่าคือ data ที่ไว้เก็บข้อมูลและ link ไว้สำหรับลิ้งไปยัง linklist ก่อนหน้า

            //เช็คว่ามี linklist temp หรือไม่
            if (temp == null) {
                System.out.print("\nHeap Overflow");
                return;
            }

            temp.data = x; // นำข้อมูลที่จะ push เข้าไปใน linklist ล่าสุด
            temp.link = top; // นำ addess บนสุดของข้อมูลไปใส่ใน temp.link หรือคือ
            // นำเอา addess ของ linklist ก่อนหน้าไปใส่ในเก็บไว้ในlinklistล่าสุด
            top = temp; //นำ addess ของ linklist ปัจจุบันไปเก็บไว้ในค่า top

        }

        public boolean isEmpty() {
            //เช็คว่า stack นี้ว่างไหม มีข้อมูลไหม
            return top == null;
        }

        public Object peek() {
            //เช็คว่า stack มีข้อมูลไหม ถ้ามี ให้return ข้อมูลบนสุด
            if (!isEmpty()) {
                return top.data;
            }
            else {
                System.out.println("Stack is empty");
                return -1;
            }
        }

        public Object pop(){
            //นำค่าออกจาก Stack โดยต้องเช็คว่าใน stack นั้นมีข้อมูลไหม ถ้ามี
            if (top == null) {
                System.out.print("\nStack Underflow");
                return "";
            } else {
                Object x = top.data; //นำข้อมูลของlinklist บนสุดไปใส่ในตัวแปร x เพื่อที่เราจะ return กลับไป
                top = (top).link; // นำ addess ที่อยู่ในค่าด้านบนสุดไปใส่ที่แทนที่ในค่าบนสุด
                // (addess ที่อยู่ในค่าด้านบน คือลิ้งที่อยู่ใน linklist บนสุด
                // คือลิ้งของ linklist ก่อนหน้าเราเอาไปแทนเพื่อที่เราจะบอกว่า linklist ก่อนหน้าเป็น linklist ที่อยู่ด้านบนสุด)
                return x; // return ข้อมูลที่อยู่ในค่า x
            }
        }

        public void display() {
            //ไว้สำหรับดูว่าค่าทั้งหมดใน stack มีอะไรบ้าง
            if (top == null) {
                System.out.printf("\nStack Underflow");
            }
            else {
                Node temp = top; //สร้าง temp ขึ้นว่าไว้สำหรับเก็บค่า บนสุดของข้อมูล
                System.out.print("Stack : ");
                while (temp != null) { //ลูปจนกว่าค่า temp จะเป็น null
                    System.out.print(temp.data + " "); // print ข้อมูลที่อยู่ใน temp
                    temp = temp.link; //นำ addess ลี่อยู่ใน tempตอนนี้ ใส่ temp ใหม่เพื่อที่เราจำเอา linklist ถัดไปมา print
                }                     //เช่นตอนนี้ temp addess @tm001 ค่าใน temp มี (data 1,link @tm002)
                // เราก็นำค่า @tm002 ไปใส่แทนที่ temp เพื่อเราจะเอาข้อมูลใน @tm002 ไป print ต่อ
                System.out.println();
            }
        }
    }


}

