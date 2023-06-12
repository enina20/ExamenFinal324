using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;



namespace Regiones
{
    public partial class Form1 : Form
    {
        int cR, cG, cB;
        int ultimoR, ultimoG, ultimoB;
        int cR0, cG0, cB0;
        int cR1, cG1,cB1;
        public Form1()
        {
            InitializeComponent();
            //Form1.Background = Color.FromHex("007BFF");
            //Form1.BackColor = Color.AliceBlue;
            mostrar_list_box();
            mostrar_list_View();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Bitmap bmp;
            openFileDialog1.ShowDialog();
            if (openFileDialog1.FileName != "")
            {
                bmp = new Bitmap(openFileDialog1.FileName);
                pictureBox1.Image = bmp;
            }
        }

        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            if (pictureBox1.Image != null)
            {


                Bitmap bmp = new Bitmap(pictureBox1.Image);
                Color c = new Color();
                int mR, mG, mB;
                mR = 0; mG = 0; mB = 0;

                c = bmp.GetPixel(e.X, e.Y);
                ultimoR = mR + c.R;
                ultimoG = mG + c.G;
                ultimoB = mB + c.B;

                for (int i = e.X - 5; i < e.X + 5; i++)
                    for (int j = e.Y - 5; j < e.Y + 5; j++)
                    {
                        c = bmp.GetPixel(i, j);
                        mR = mR + c.R;
                        mG = mG + c.G;
                        mB = mB + c.B;

                    }
                mR = mR / 100;
                mG = mG / 100;
                mB = mB / 100;
                textBox1.Text = mR.ToString();
                textBox2.Text = mG.ToString();
                textBox3.Text = mB.ToString();
                cR = mR;
                cG = mG;
                cB = mB;

                Color red = Color.Red;
                textBox5.BackColor = Color.FromArgb(cR, cG, cB);

            }
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++)
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(c.R, 0, 0));
                }
            pictureBox2.Image = bmp2;
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++)
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(0, c.G, 0));
                }
            pictureBox2.Image = bmp2;
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++)
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(0, 0, c.B));
                }
            pictureBox2.Image = bmp2;
        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void listBox1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void button7_Click(object sender, EventArgs e)
        {
            if (pictureBox1.Image != null)
            {

                SqlConnection con = new SqlConnection();
                SqlCommand cmd = new SqlCommand();

                con.ConnectionString = "server=(local);user=sa;pwd=abc123456;database=texturas";
                cmd.Connection = con;

                // Parse RGB color from a string
                //var color = Color.FromArgb(222, 180, 135);

                // Convert RGB to HEX 
                //string hexColor = color.TOString();

                String hexColor = System.Drawing.ColorTranslator.ToHtml(Color.FromArgb(ultimoR, ultimoG, ultimoB, 255));  //returns the hex value

                cmd.CommandText = "insert into colores values('" +
                    textBox4.Text + "'," + cR.ToString() + "," + cG.ToString()
                    + "," + cB.ToString() + ",'" + hexColor + "')";
                con.Open();
                cmd.ExecuteNonQuery();
                con.Close();
                mostrar_list_box();
                mostrar_list_View();
            }
        }
        private void listBox1_SelectedIndexChanged_1(object sender, EventArgs e)
        {
            if (pictureBox1.Image != null)
            {
                // Get the currently selected item in the ListBox.
                string curItem = listBox1.SelectedItem.ToString();
                textBox4.Text = curItem;
                // Find the string in ListBox2.
                // int index = listBox2.FindString(curItem);
                // If the item was not found in ListBox 2 display a message box, otherwise select it in ListBox2.
                //if (index == -1)
                //    MessageBox.Show("Item is not available in ListBox2");
                //else
                //    listBox2.SetSelected(index, true);
            }
        }

        private void textBox4_TextChanged(object sender, EventArgs e)
        {

        }

        private void textBox6_TextChanged(object sender, EventArgs e)
        {

        }

        private void listView1_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (pictureBox1.Image != null)
            {
                if (listView1.SelectedIndices.Count <= 0)
                {
                    return;
                }
                int intselectedindex = listView1.SelectedIndices[0];
                if (intselectedindex >= 0)
                {
                    label6.Text = listView1.Items[intselectedindex].Text;
                    String nombre_region = listView1.Items[intselectedindex].Text;

                    Bitmap bmp = new Bitmap(pictureBox1.Image);
                    Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
                    int mmR, mmG, mmB;
                    Color c = new Color();
                    string cad = "";
                    /////**************************
                    ///
                    SqlConnection cn = new SqlConnection();
                    SqlCommand cm = new SqlCommand();

                    cn.ConnectionString = "server=(local);user=sa;pwd=abc123456;database=texturas";
                    cm.Connection = cn;
                    cm.CommandText = "select*from colores where descripcion like '" + nombre_region.ToString() + "'";
                    cn.Open();
                    SqlDataReader dr = cm.ExecuteReader();
                    if (dr.HasRows)
                    {
                        while (dr.Read())
                        {
                            cR = dr.GetInt32(1);
                            cG = dr.GetInt32(2);
                            cB = dr.GetInt32(3);

                            cad = cad + " : " + dr.GetString(0);
                            label6.Text = cad;
                            textBox6.BackColor = Color.FromArgb(255 - cR, 255 - cG, 255 - cB);
                            //mmR = mmR + cR1;
                            //mmG = mmG + cG1;
                            //mmB = mmB + cB1;
                            for (int i = 0; i < bmp.Width - 10; i = i + 10)
                            {
                                for (int j = 0; j < bmp.Height - 10; j = j + 10)
                                {
                                    mmR = 0; mmG = 0; mmB = 0;
                                    for (int k = i; k < i + 10; k++)
                                        for (int l = j; l < j + 10; l++)
                                        {
                                            c = bmp.GetPixel(k, l);
                                            mmR = mmR + c.R;
                                            mmG = mmG + c.G;
                                            mmB = mmB + c.B;
                                        }
                                    mmR = mmR / 100;
                                    mmG = mmG / 100;
                                    mmB = mmB / 100;

                                    if (((cR - 20 < mmR) && (mmR < cR + 20)) && ((cG - 10 < mmG) && (mmG < cG + 20))
                                        && ((cB - 20 < mmB) && (mmB < cB + 20)))
                                    {
                                        for (int k = i; k < i + 10; k++)
                                            for (int l = j; l < j + 10; l++)
                                            {
                                                if (k == i || k == i + 19 || l == j || l == j + 19)
                                                {
                                                    bmp2.SetPixel(k, l, Color.Blue);
                                                    //bmp2.SetPixel(k, l, Color.FromArgb(255 - cR, 255 - cG, 255 - cB));

                                                }
                                                else
                                                {
                                                    //bmp2.SetPixel(k, l, Color.FromArgb(cR, cG, cB));

                                                    bmp2.SetPixel(k, l, Color.FromArgb(255 - cR, 255 - cG, 255 - cB));
                                                    //bmp2.SetPixel(k, l, Color.Blue);
                                                }
                                            }
                                    }
                                    else
                                    {
                                        for (int k = i; k < i + 10; k++)
                                            for (int l = j; l < j + 10; l++)
                                            {
                                                c = bmp.GetPixel(k, l);
                                                bmp2.SetPixel(k, l, Color.FromArgb(c.R, c.G, c.B));
                                            }
                                    }
                                }
                            }
                            pictureBox2.Image = bmp2;
                            bmp = new Bitmap(pictureBox2.Image);
                        }

                        //cR = mmR / 100;
                        //cG = mmG / 100;
                        //cB = mmB / 100;
                        //listView1.Items.Add((dr.GetString(0)));
                        //listView1.Items[listView1.Items.Count - 1].BackColor = Color.FromArgb(cR, cG, cB);

                    }
                    cn.Close();
                    ///////*****************

                }
            }
        }
        private void listView1_SelectedIndexChanged_HHH(object sender, EventArgs e)
        {
            if (listView1.SelectedIndices.Count <= 0)
            {
                return;
            }
            int intselectedindex = listView1.SelectedIndices[0];
            if (intselectedindex >= 0)
            {
                label6.Text = listView1.Items[intselectedindex].Text;
                String nombre_region = listView1.Items[intselectedindex].Text;
                Bitmap bmp = new Bitmap(pictureBox1.Image);
                Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
                int mmR, mmG, mmB;
                Color c = new Color();

                ////////////////////////**********************************************************
                ////////////////////////**********************************************************
                ///

                SqlConnection cn = new SqlConnection();
                SqlCommand cm = new SqlCommand();

                cn.ConnectionString = "server=(local);user=sa;pwd=abc123456;database=texturas";
                cm.Connection = cn;
                cm.CommandText = "select*from colores where descripcion like '" + nombre_region.ToString() + "'";
                cn.Open();
                SqlDataReader dr = cm.ExecuteReader();
                if (dr.HasRows)
                {
                    while (dr.Read())
                    {
                        cR1 = dr.GetInt32(1);
                        cG1 = dr.GetInt32(2);
                        cB1 = dr.GetInt32(3);

                        //mmR = mmR + cR1;
                        //mmG = mmG + cG1;
                        //mmB = mmB + cB1;
                    }

                    //cR = mmR / 100;
                    //cG = mmG / 100;
                    //cB = mmB / 100;
                    //listView1.Items.Add((dr.GetString(0)));
                    //listView1.Items[listView1.Items.Count - 1].BackColor = Color.FromArgb(cR, cG, cB);

                }
                cn.Close();
                ////////////////////////**********************************************************
                ///
                for (int i = 0; i < bmp.Width - 20; i = i + 10)
                {
                    for (int j = 0; j < bmp.Height - 20; j = j + 10)
                    {
                        mmR = 0; mmG = 0; mmB = 0;
                        for (int k = i; k < i + 10; k++)
                            for (int l = j; l < j + 10; l++)
                            {
                                c = bmp.GetPixel(k, l);
                                mmR = mmR + c.R;
                                mmG = mmG + c.G;
                                mmB = mmB + c.B;
                            }
                        mmR = mmR / 100;
                        mmG = mmG / 100;
                        mmB = mmB / 100;

                        if (((cR - 20 < mmR) && (mmR < cR + 20)) && ((cG - 20 < mmG) && (mmG < cG + 20))
                            && ((cB - 20 < mmB) && (mmB < cB + 20)))

                        //if (true)
                        {
                            for (int k = i; k < i + 20; k++)
                                for (int l = j; l < j + 20; l++)
                                {
                                    if (k == i || k == i + 19 || l == j || l == j + 19)
                                    {
                                        bmp2.SetPixel(k, l, Color.Blue);
                                    }
                                    else
                                    {
                                        bmp2.SetPixel(k, l, Color.FromArgb(255 - cR, 255 - cG, 255 - cB));
                                        //bmp2.SetPixel(k, l, Color.Blue);
                                    }
                                }
                        }
                        else
                        {
                            for (int k = i; k < i + 10; k++)
                                for (int l = j; l < j + 10; l++)
                                {
                                    c = bmp.GetPixel(k, l);
                                    bmp2.SetPixel(k, l, Color.FromArgb(c.R, c.G, c.B));
                                }
                        }
                    }
                }
                textBox6.BackColor = Color.FromArgb(255 - cR, 255 - cG, 255 - cB);
                pictureBox2.Image = bmp2;

            }
        }
        private void label6_Click(object sender, EventArgs e)
        {

        }

        private void mostrar_list_View()
        {
            listView1.Items.Clear();
            listView2.Items.Clear();
            listView3.Items.Clear();
            listView4.Items.Clear();
            //cadena de coneccion cambia por tu servidor local
            SqlConnection cn = new SqlConnection();
            SqlCommand cm = new SqlCommand();

            cn.ConnectionString = "server=(local);user=sa;pwd=abc123456;database=texturas";
            cm.Connection = cn;
            //////////
            //SqlConnection cn = new SqlConnection("Data Source=tuservidor;Initial Catalog=ImportacionesNet;Integrated Security=True");
            cm.CommandText = "select*from colores";
            //SqlCommand cm = new SqlCommand("select*from productos", cn);
            //abrimos la coneccion
            cn.Open();
            SqlDataReader dr = cm.ExecuteReader();
            if (dr.HasRows)
            {
                //if datos son leido agregamos al control
                while (dr.Read())
                {
                    cR = dr.GetInt32(1);
                    cG = dr.GetInt32(2);
                    cB = dr.GetInt32(3);
                    listView1.Items.Add((dr.GetString(0)));
                    //listView1.Items[listView1.Items.Count - 1].ForeColor = Color.Green;
                    //listView1.Items[listView1.Items.Count - 1].BackColor = Color.FromArgb(cR, cG, cB);
                    ///////////////////////// list view 2
                    ///
                    listView2.Items.Add("aaaa");
                    listView2.Items[listView2.Items.Count - 1].ForeColor = Color.FromArgb(255 - cR, 255 - cG, 255 - cB);
                    listView2.Items[listView2.Items.Count - 1].BackColor = Color.FromArgb(255-cR,255- cG,255- cB);
                    listView3.Items.Add((dr.GetString(0)));

                    listView4.Items.Add("aaaa");
                    listView4.Items[listView4.Items.Count - 1].ForeColor = Color.FromArgb(cR, cG, cB);
                    listView4.Items[listView4.Items.Count - 1].BackColor = Color.FromArgb(cR, cG, cB);

                }
            }
            //cerrams la coneccion
            cn.Close();
        }
        private void mostrar_list_box()
        {
            listBox1.Items.Clear();
            //cadena de coneccion cambia por tu servidor local
            SqlConnection cn = new SqlConnection();
            SqlCommand cm = new SqlCommand();

            cn.ConnectionString = "server=(local);user=sa;pwd=abc123456;database=texturas";
            cm.Connection = cn;
            //////////
            //SqlConnection cn = new SqlConnection("Data Source=tuservidor;Initial Catalog=ImportacionesNet;Integrated Security=True");
            cm.CommandText = "select DISTINCT descripcion from colores";
            //SqlCommand cm = new SqlCommand("select*from productos", cn);
            //abrimos la coneccion
            cn.Open();
            SqlDataReader dr = cm.ExecuteReader();
            if (dr.HasRows)
            {
                //if datos son leido agregamos al control
                while (dr.Read())
                {
                    //agregamos el origen de datos al control
                    this.listBox1.Items.Add(dr.GetString(0));
                    //listBox1.Items[listBox1.Items.Count - 1].BackColor = Color.Green;
                    //listBox1.Items[listBox1.Items.Count - 1].ForeColor = Color.Green;
                    //Color red = Color.Red;

                    //this.listBox1.BackColor = Color.FromArgb(1,255/10,1);
                }
            }
            //cerrams la coneccion
            cn.Close();
        }


        private void button5_Click_kkkk(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();
            SqlDataReader dr;
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            int clR, clG, clB;
            string colorcambio;
            con.ConnectionString = "server=(local);user=sa;pwd=abc123456;database=texturas";
            cmd.Connection = con;
            cmd.CommandText = "select * from colores";
            con.Open();
            dr = cmd.ExecuteReader();
            while (dr.Read())
            {
                cR = dr.GetInt32(1);
                cG = dr.GetInt32(2);
                cB = dr.GetInt32(3);
                colorcambio = dr.GetString(4);
                bmp2 = new Bitmap(bmp.Width, bmp.Height);
                for (int i = 0; i < bmp.Width; i++)
                    for (int j = 0; j < bmp.Height; j++)
                    {
                        c = bmp.GetPixel(i, j);
                        if (((cR - 10 < c.R) && (c.R < cR + 10)) && ((cG - 10 < c.G) && (c.G < cG + 10))
                            && ((cB - 10 < c.B) && (c.B < cB + 10)))
                        {
                            clR = Convert.ToInt32(colorcambio.Substring(1, 2), 16);
                            clG = Convert.ToInt32(colorcambio.Substring(3, 2), 16);
                            clB = Convert.ToInt32(colorcambio.Substring(5, 2), 16);
                            //textBox5.Text = colorcambio+" R:: "+clR+"   G:: "+clG+"   B:: "+clG;
                            textBox5.Text = colorcambio + " R:: " + colorcambio.Substring(1, 2) + "   G:: " + colorcambio.Substring(3, 2) + "   B:: " + colorcambio.Substring(5, 2);

                            // if (colorcambio == "333dff")
                            // bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));
                            //if (colorcambio == "4d1f05")
                            // bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));
                            //if (colorcambio == "054d1a")
                            bmp2.SetPixel(i, j, Color.FromArgb(255 - clR, 255 - clG, 255 - clB));
                            textBox5.BackColor = Color.FromArgb(255 - clR, 255 - clG, 255 - clB);
                        }
                        else
                            bmp2.SetPixel(i, j, Color.FromArgb(c.R, c.G, c.B));
                    }
                bmp = bmp2;
            }

            pictureBox2.Image = bmp2;

            con.Close();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            if (pictureBox1.Image != null)
            {


                SqlConnection con = new SqlConnection();
                SqlCommand cmd = new SqlCommand();
                SqlDataReader dr;
                Bitmap bmp = new Bitmap(pictureBox1.Image);
                Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
                Color c = new Color();
                int clR, clG, clB;
                int mmR, mmG, mmB;
                string colorcambio;
                con.ConnectionString = "server=(local);user=sa;pwd=abc123456;database=texturas";
                cmd.Connection = con;
                cmd.CommandText = "select DISTINCT descripcion from colores";
                con.Open();
                string cadd = "";
                dr = cmd.ExecuteReader();
                while (dr.Read())
                {

                    //cadd = cadd + " : " + dr.GetString(0);
                    //label6.Text = cadd;
                    //bmp2 = new Bitmap(bmp.Width, bmp.Height);


                    //label6.Text = listView1.Items[intselectedindex].Text;
                    String nombre_region = dr.GetString(0);

                    //Bitmap bmp = new Bitmap(pictureBox1.Image);
                    //Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
                    //int mmR, mmG, mmB;
                    //Color c = new Color();
                    string cad = "";
                    /////**************************
                    ///
                    SqlConnection cn = new SqlConnection();
                    SqlCommand cm = new SqlCommand();

                    cn.ConnectionString = "server=(local);user=sa;pwd=abc123456;database=texturas";
                    cm.Connection = cn;
                    cm.CommandText = "select*from colores where descripcion like '" + nombre_region.ToString() + "'";
                    cn.Open();
                    SqlDataReader drr = cm.ExecuteReader();
                    if (drr.HasRows)
                    {
                        while (drr.Read())
                        {
                            cR = drr.GetInt32(1);
                            cG = drr.GetInt32(2);
                            cB = drr.GetInt32(3);

                            //cad = cad + " : " + drr.GetString(0);
                            //label6.Text = cad;
                            //mmR = mmR + cR1;
                            //mmG = mmG + cG1;
                            //mmB = mmB + cB1;
                            for (int i = 0; i < bmp.Width - 10; i = i + 10)
                            {
                                for (int j = 0; j < bmp.Height - 10; j = j + 10)
                                {
                                    mmR = 0; mmG = 0; mmB = 0;
                                    for (int k = i; k < i + 10; k++)
                                        for (int l = j; l < j + 10; l++)
                                        {
                                            c = bmp.GetPixel(k, l);
                                            mmR = mmR + c.R;
                                            mmG = mmG + c.G;
                                            mmB = mmB + c.B;
                                        }
                                    mmR = mmR / 100;
                                    mmG = mmG / 100;
                                    mmB = mmB / 100;

                                    if (((cR - 10 < mmR) && (mmR < cR + 10)) && ((cG - 10 < mmG) && (mmG < cG + 10))
                                        && ((cB - 10 < mmB) && (mmB < cB + 10)))
                                    {
                                        for (int k = i; k < i + 10; k++)
                                            for (int l = j; l < j + 10; l++)
                                            {
                                                if (k == i || k == i + 19 || l == j || l == j + 19)
                                                {
                                                    bmp2.SetPixel(k, l, Color.Blue);
                                                }
                                                else
                                                {
                                                //bmp2.SetPixel(k, l, Color.FromArgb(cR, cG, cB));
                                                bmp2.SetPixel(k, l, Color.FromArgb(255 - cR, 255 - cG, 255 - cB));
                                                    //bmp2.SetPixel(k, l, Color.Blue);
                                                }
                                            }
                                    }
                                    else
                                    {
                                        for (int k = i; k < i + 10; k++)
                                            for (int l = j; l < j + 10; l++)
                                            {
                                                c = bmp.GetPixel(k, l);
                                                bmp2.SetPixel(k, l, Color.FromArgb(c.R, c.G, c.B));
                                            }
                                    }
                                }
                            }
                            pictureBox2.Image = bmp2;
                            bmp = new Bitmap(pictureBox2.Image);

                        }

                        //cR = mmR / 100;
                        //cG = mmG / 100;
                        //cB = mmB / 100;
                        //listView1.Items.Add((dr.GetString(0)));
                        //listView1.Items[listView1.Items.Count - 1].BackColor = Color.FromArgb(cR, cG, cB);

                    }
                    cadd = cadd + " : " + dr.GetString(0);
                    label6.Text = cadd;
                    cn.Close();
                    ///////*****************

                }

                pictureBox2.Image = bmp2;

                con.Close();
            }
        }

        private void button5_Click_5555555(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();
            SqlDataReader dr;
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            int clR, clG, clB;
            string colorcambio;
            con.ConnectionString = "server=(local);user=sa;pwd=abc123456;database=texturas";
            cmd.Connection = con;
            cmd.CommandText = "select * from colores";
            con.Open();
            dr = cmd.ExecuteReader();
            while (dr.Read())
            {
                cR = dr.GetInt32(1);
                cG = dr.GetInt32(2);
                cB = dr.GetInt32(3);
                colorcambio = dr.GetString(4);
                bmp2 = new Bitmap(bmp.Width, bmp.Height);
                for (int i = 0; i < bmp.Width; i++)
                    for (int j = 0; j < bmp.Height; j++)
                    {
                        c = bmp.GetPixel(i, j);
                        if (((cR - 10 < c.R) && (c.R < cR + 10)) && ((cG - 10 < c.G) && (c.G < cG + 10))
                            && ((cB - 10 < c.B) && (c.B < cB + 10)))
                        {
                            clR = Convert.ToInt32(colorcambio.Substring(1, 2), 16);
                            clG = Convert.ToInt32(colorcambio.Substring(3, 2), 16);
                            clB = Convert.ToInt32(colorcambio.Substring(5, 2), 16);
                            //textBox5.Text = colorcambio+" R:: "+clR+"   G:: "+clG+"   B:: "+clG;
                            textBox5.Text = colorcambio + " R:: " + colorcambio.Substring(1, 2) + "   G:: " + colorcambio.Substring(3, 2) + "   B:: " + colorcambio.Substring(5, 2);

                            // if (colorcambio == "333dff")
                            // bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));
                            //if (colorcambio == "4d1f05")
                            // bmp2.SetPixel(i, j, Color.FromArgb(clR, clG, clB));
                            //if (colorcambio == "054d1a")
                            bmp2.SetPixel(i, j, Color.FromArgb(255 - clR, 255 - clG, 255 - clB));
                            textBox5.BackColor = Color.FromArgb(255 - clR, 255 - clG, 255 - clB);
                        }
                        else
                            bmp2.SetPixel(i, j, Color.FromArgb(c.R, c.G, c.B));
                    }
                bmp = bmp2;
            }

            pictureBox2.Image = bmp2;

            con.Close();
        }

        private void button6_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            int mmR, mmG, mmB;
            Color c = new Color();
            for (int i = 0; i < bmp.Width - 10; i = i + 10)
            {
                for (int j = 0; j < bmp.Height - 10; j = j + 10)
                {
                    mmR = 0; mmG = 0; mmB = 0;
                    for (int k = i; k < i + 10; k++)
                        for (int l = j; l < j + 10; l++)
                        {
                            c = bmp.GetPixel(k, l);
                            mmR = mmR + c.R;
                            mmG = mmG + c.G;
                            mmB = mmB + c.B;
                        }
                    mmR = mmR / 100;
                    mmG = mmG / 100;
                    mmB = mmB / 100;

                    if (((cR - 10 < mmR) && (mmR < cR + 10)) && ((cG - 10 < mmG) && (mmG < cG + 10))
                        && ((cB - 10 < mmB) && (mmB < cB + 10)))
                    {
                        for (int k = i; k < i + 10; k++)
                            for (int l = j; l < j + 10; l++)
                            {
                                bmp2.SetPixel(k, l, Color.Black);
                            }
                    }
                    else
                    {
                        for (int k = i; k < i + 10; k++)
                            for (int l = j; l < j + 10; l++)
                            {
                                c = bmp.GetPixel(k, l);
                                bmp2.SetPixel(k, l, Color.FromArgb(c.R, c.G, c.B));
                            }
                    }
                }
            }
            pictureBox2.Image = bmp2;
        }

    }
}