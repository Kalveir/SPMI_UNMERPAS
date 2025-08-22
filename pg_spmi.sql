--
-- PostgreSQL database dump
--

-- Dumped from database version 14.18 (Ubuntu 14.18-0ubuntu0.22.04.1)
-- Dumped by pg_dump version 14.18 (Ubuntu 14.18-0ubuntu0.22.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'SQL_ASCII';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: spmi; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA spmi;


ALTER SCHEMA spmi OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: bobot; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bobot (
    id bigint NOT NULL,
    indikator_id bigint,
    bobot bigint DEFAULT '0'::bigint
);


ALTER TABLE public.bobot OWNER TO postgres;

--
-- Name: bobot_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bobot_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bobot_id_seq OWNER TO postgres;

--
-- Name: bobot_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bobot_id_seq OWNED BY public.bobot.id;


--
-- Name: bookdocs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bookdocs (
    id bigint NOT NULL,
    standard_id bigint,
    jenis character varying(50) DEFAULT NULL::character varying,
    nama character varying(255) DEFAULT NULL::character varying,
    jenis_file character varying(255) DEFAULT NULL::character varying,
    nama_file character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.bookdocs OWNER TO postgres;

--
-- Name: bookdocs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bookdocs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bookdocs_id_seq OWNER TO postgres;

--
-- Name: bookdocs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bookdocs_id_seq OWNED BY public.bookdocs.id;


--
-- Name: bookmanual; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bookmanual (
    id bigint NOT NULL,
    standard_id bigint,
    pegawai_id bigint,
    jenis character varying(50) DEFAULT NULL::character varying,
    visi_misi text,
    tujuan text,
    ruanglingkup text,
    definisi_istilah text,
    tahapan text,
    status bigint
);


ALTER TABLE public.bookmanual OWNER TO postgres;

--
-- Name: bookmanual_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bookmanual_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bookmanual_id_seq OWNER TO postgres;

--
-- Name: bookmanual_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bookmanual_id_seq OWNED BY public.bookmanual.id;


--
-- Name: bookstandard; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bookstandard (
    id bigint NOT NULL,
    standard_id bigint,
    pegawai_id bigint,
    visi_misi text,
    tujuan text,
    rasional text,
    subjek text,
    definisi_istilah text,
    status bigint
);


ALTER TABLE public.bookstandard OWNER TO postgres;

--
-- Name: bookstandard_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bookstandard_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bookstandard_id_seq OWNER TO postgres;

--
-- Name: bookstandard_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bookstandard_id_seq OWNED BY public.bookstandard.id;


--
-- Name: fakultas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fakultas (
    id bigint NOT NULL,
    nama character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.fakultas OWNER TO postgres;

--
-- Name: fakultas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.fakultas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fakultas_id_seq OWNER TO postgres;

--
-- Name: fakultas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.fakultas_id_seq OWNED BY public.fakultas.id;


--
-- Name: indikator; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.indikator (
    id bigint NOT NULL,
    standard_id bigint,
    pegawai_id bigint,
    isi character varying(255) DEFAULT NULL::character varying,
    strategi character varying(255) DEFAULT NULL::character varying,
    indikator character varying(255) DEFAULT NULL::character varying,
    satuan character varying(50) DEFAULT NULL::character varying,
    target bigint,
    status bigint
);


ALTER TABLE public.indikator OWNER TO postgres;

--
-- Name: indikator_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.indikator_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.indikator_id_seq OWNER TO postgres;

--
-- Name: indikator_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.indikator_id_seq OWNED BY public.indikator.id;


--
-- Name: indikator_jenis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.indikator_jenis (
    id bigint NOT NULL,
    jenis_id bigint,
    indikator_id bigint
);


ALTER TABLE public.indikator_jenis OWNER TO postgres;

--
-- Name: indikator_jenis_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.indikator_jenis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.indikator_jenis_id_seq OWNER TO postgres;

--
-- Name: indikator_jenis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.indikator_jenis_id_seq OWNED BY public.indikator_jenis.id;


--
-- Name: jenis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jenis (
    id bigint NOT NULL,
    nama character varying(100) DEFAULT NULL::character varying,
    status bigint
);


ALTER TABLE public.jenis OWNER TO postgres;

--
-- Name: jenis_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jenis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.jenis_id_seq OWNER TO postgres;

--
-- Name: jenis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jenis_id_seq OWNED BY public.jenis.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id bigint NOT NULL,
    migration character varying(255) NOT NULL,
    batch bigint NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: model_has_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.model_has_permissions (
    permission_id numeric NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id numeric NOT NULL
);


ALTER TABLE public.model_has_permissions OWNER TO postgres;

--
-- Name: model_has_roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.model_has_roles (
    role_id numeric NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id numeric NOT NULL
);


ALTER TABLE public.model_has_roles OWNER TO postgres;

--
-- Name: nilai; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.nilai (
    id bigint NOT NULL,
    indikator_id bigint,
    deskripsi text,
    nilai bigint DEFAULT '0'::bigint,
    status bigint
);


ALTER TABLE public.nilai OWNER TO postgres;

--
-- Name: nilai_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.nilai_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nilai_id_seq OWNER TO postgres;

--
-- Name: nilai_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.nilai_id_seq OWNED BY public.nilai.id;


--
-- Name: pegawai; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pegawai (
    id bigint NOT NULL,
    prodi_id bigint NOT NULL,
    nama character varying(100) DEFAULT NULL::character varying,
    email character varying(255) DEFAULT NULL::character varying,
    password text,
    status bigint,
    created_at timestamp with time zone,
    remember_token character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.pegawai OWNER TO postgres;

--
-- Name: pegawai_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pegawai_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pegawai_id_seq OWNER TO postgres;

--
-- Name: pegawai_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pegawai_id_seq OWNED BY public.pegawai.id;


--
-- Name: pengisian; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pengisian (
    id bigint NOT NULL,
    indikator_id bigint,
    pegawai_id bigint,
    program_studi bigint,
    audhitor bigint,
    nilai bigint,
    komentar character varying(255) DEFAULT NULL::character varying,
    tahun bigint,
    tanggal character varying(15) DEFAULT NULL::character varying,
    aksi_code bigint
);


ALTER TABLE public.pengisian OWNER TO postgres;

--
-- Name: pengisian_berkas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pengisian_berkas (
    id bigint NOT NULL,
    indikator_id bigint,
    pengisian_id bigint,
    program_studi_id bigint,
    pegawai_id bigint,
    jenis character varying(50) DEFAULT NULL::character varying,
    deskripsi text,
    nama_file character varying(255) DEFAULT NULL::character varying,
    nama_asli character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.pengisian_berkas OWNER TO postgres;

--
-- Name: pengisian_berkas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pengisian_berkas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pengisian_berkas_id_seq OWNER TO postgres;

--
-- Name: pengisian_berkas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pengisian_berkas_id_seq OWNED BY public.pengisian_berkas.id;


--
-- Name: pengisian_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pengisian_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pengisian_id_seq OWNER TO postgres;

--
-- Name: pengisian_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pengisian_id_seq OWNED BY public.pengisian.id;


--
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permissions (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp with time zone,
    updated_at timestamp with time zone
);


ALTER TABLE public.permissions OWNER TO postgres;

--
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permissions_id_seq OWNER TO postgres;

--
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;


--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id numeric NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp with time zone,
    expires_at timestamp with time zone,
    created_at timestamp with time zone,
    updated_at timestamp with time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: program_studi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.program_studi (
    id bigint NOT NULL,
    fakultas_id bigint,
    nama character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.program_studi OWNER TO postgres;

--
-- Name: program_studi_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.program_studi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.program_studi_id_seq OWNER TO postgres;

--
-- Name: program_studi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.program_studi_id_seq OWNED BY public.program_studi.id;


--
-- Name: role_has_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.role_has_permissions (
    permission_id numeric NOT NULL,
    role_id numeric NOT NULL
);


ALTER TABLE public.role_has_permissions OWNER TO postgres;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp with time zone,
    updated_at timestamp with time zone
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO postgres;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- Name: standard; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.standard (
    id bigint NOT NULL,
    pegawai_id bigint,
    nama character varying(255) DEFAULT NULL::character varying,
    status bigint
);


ALTER TABLE public.standard OWNER TO postgres;

--
-- Name: standard_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.standard_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.standard_id_seq OWNER TO postgres;

--
-- Name: standard_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.standard_id_seq OWNED BY public.standard.id;


--
-- Name: bobot id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bobot ALTER COLUMN id SET DEFAULT nextval('public.bobot_id_seq'::regclass);


--
-- Name: bookdocs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookdocs ALTER COLUMN id SET DEFAULT nextval('public.bookdocs_id_seq'::regclass);


--
-- Name: bookmanual id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookmanual ALTER COLUMN id SET DEFAULT nextval('public.bookmanual_id_seq'::regclass);


--
-- Name: bookstandard id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookstandard ALTER COLUMN id SET DEFAULT nextval('public.bookstandard_id_seq'::regclass);


--
-- Name: fakultas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fakultas ALTER COLUMN id SET DEFAULT nextval('public.fakultas_id_seq'::regclass);


--
-- Name: indikator id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.indikator ALTER COLUMN id SET DEFAULT nextval('public.indikator_id_seq'::regclass);


--
-- Name: indikator_jenis id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.indikator_jenis ALTER COLUMN id SET DEFAULT nextval('public.indikator_jenis_id_seq'::regclass);


--
-- Name: jenis id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jenis ALTER COLUMN id SET DEFAULT nextval('public.jenis_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: nilai id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nilai ALTER COLUMN id SET DEFAULT nextval('public.nilai_id_seq'::regclass);


--
-- Name: pegawai id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pegawai ALTER COLUMN id SET DEFAULT nextval('public.pegawai_id_seq'::regclass);


--
-- Name: pengisian id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian ALTER COLUMN id SET DEFAULT nextval('public.pengisian_id_seq'::regclass);


--
-- Name: pengisian_berkas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian_berkas ALTER COLUMN id SET DEFAULT nextval('public.pengisian_berkas_id_seq'::regclass);


--
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: program_studi id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.program_studi ALTER COLUMN id SET DEFAULT nextval('public.program_studi_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Name: standard id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.standard ALTER COLUMN id SET DEFAULT nextval('public.standard_id_seq'::regclass);


--
-- Data for Name: bobot; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bobot (id, indikator_id, bobot) FROM stdin;
1	1	20
2	2	20
3	3	25
4	4	25
5	5	10
6	6	20
7	7	20
8	8	30
9	9	30
10	10	30
11	11	15
12	12	30
13	13	25
14	14	40
15	15	20
16	16	40
17	17	25
18	18	30
19	19	30
20	20	15
21	21	30
22	22	30
23	23	20
24	24	20
25	25	40
26	26	20
27	27	20
28	28	20
29	29	30
30	30	30
31	31	20
32	32	20
33	33	20
34	34	30
35	35	20
36	36	20
37	37	60
38	38	40
39	39	25
40	40	25
41	41	25
42	42	25
43	43	60
44	44	40
45	45	60
46	46	40
47	47	60
48	48	40
49	49	40
50	50	40
51	51	20
52	52	50
53	53	50
54	54	60
55	55	40
56	56	60
57	57	40
58	58	25
59	59	25
60	60	25
61	61	25
62	62	60
63	63	40
64	64	60
65	65	40
66	66	50
67	67	50
68	68	30
69	69	40
70	70	30
71	71	60
72	72	40
\.


--
-- Data for Name: bookdocs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bookdocs (id, standard_id, jenis, nama, jenis_file, nama_file) FROM stdin;
1	1	Penetapan	Manual PPEP Standar Kompetensi Lulusan	SOP	cFdeobfhAEO0bljp4zY4ExpG8bADaSKmzUTt71rO.pdf
\.


--
-- Data for Name: bookmanual; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bookmanual (id, standard_id, pegawai_id, jenis, visi_misi, tujuan, ruanglingkup, definisi_istilah, tahapan, status) FROM stdin;
1	1	2	Penetapan	<ul><li><b><span style="font-size: 18px;">Visi</span></b></li></ul><p style="line-height: 1.5; margin-left: 25px;"><span style="font-size: 18px;">Menjadi Universitas unggul dalam menciptakan dan mengembangkan sumberdaya manusia melalui Tri Dharma PerguruanTinggi</span></p><ul><li><b><span style="font-size: 18px;">Misi</span></b></li></ul><ol><li style="text-align: justify; "><span style="font-size: 18px;">Menyelenggarakan program pendidikan tinggi yang unggul melalui kegiatan akademik yang kompetitif</span></li><li style="text-align: justify;"><span style="font-size: 18px;">Melaksanakan kegiatan yang unggul dalam penelitian dan pengembangan ilmu pengetahuan secara terpadu dalam pelaksanaan proses pembelajaran.</span></li><li style="text-align: justify;"><span style="font-size: 18px;">Menumbuh kembangkan keunggulan terhadap lingkungan melalui pengabdian kepada masyarakat sebagai implementasi keilmuan.</span></li></ol><div><br></div>	<p style="text-align: justify; "><span style="font-size: 18px;">Menjadi acuan program studi dalam penyusunan kurikulum penyelenggaraan pembelajaran dengan penetapan, pelaksanaan, evaluasi, pengendalian dan peningkatan kompetensi lulusan sesuai kebutuhan stakeholder</span></p><div><br></div>	<p style="text-align: justify; "><span style="font-size: 18px;">Seluruh aktivitas penetapan, pelaksanaan, evaluasi, pengendalian, peningkatan perumusan kompetensi lulusan.</span></p><div style="text-align: justify;"><br></div>	<p style="text-align: justify; "><span style="font-size: 18px;">Kompetensi lulusan adalah kriteria minimal tentang kualifikasi kemampuan lulusan yang mencakup sikap, pengetahuan, dan keterampilan yang dirumuskan dalam CPL dan mengacu pada KKNI sertas dituangkan dalam SKPI.</span></p><div><br></div>	<ol><li style="text-align: justify; "><span style="font-size: 18px;">Yayasan, Pimpinan Universitasdan unit kerja sesuai dengan tupoksinya, menetapkan aturan penyusunan kompetensi lulusan Surat Keputusan sesuai dengan standar Universitas Merdeka Pasuruan.</span></li><li style="text-align: justify;"><span style="font-size: 18px;">Pimpinan Universitas dan unit kerja sesuai dengan tupoksinya menjaga dan meningkatkan mutu dan relevansi kompetensi lulusan program studi</span></li><li style="text-align: justify;"><span style="font-size: 18px;">Perumusan kompetensi lulusan pada tingkat program studi dilakukan berdasarkan visi dan misi program studi</span></li></ol><div><br></div><div><br></div><div><br></div><div><br></div>	1
\.


--
-- Data for Name: bookstandard; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bookstandard (id, standard_id, pegawai_id, visi_misi, tujuan, rasional, subjek, definisi_istilah, status) FROM stdin;
1	1	1	<ul><li><span style="font-size: 18px;"><b>Visi</b></span></li></ul><p></p><p style="margin-left: 25px;"><span style="font-size: 18px;">Menjadi Universitas unggul dalam menciptakan dan mengembangkan sumberdaya manusia melalui Tri Dharma Perguruan Tinggi.</span></p><p></p><ul><li><span style="font-size: 18px;"><b>Misi</b></span></li></ul><ol><li><span style="font-size: 18px;">Menyelenggarakan program pendidikan tinggi yang unggul melalui kegiatan akademik yang kompetitif.</span></li><li><span style="font-size: 18px;">Melaksanakan kegiatan yang unggul dalam penelitian dan pengembangan ilmu pengetahuan secara terpadu dalam pelaksanaan proses pembelajaran.</span></li><li><span style="font-size: 18px;">Menumbuhkembangkan keunggulan terhadap lingkungan melalui pengabdian kepada masyarakat sebagai implementasi keilmuan.</span></li></ol><div><br></div>	<p class="MsoNormal" style="text-align: justify; border: none;"><span style="font-size: 18px;">Tujuan dari penetapan standar kompetensi lulusan adalah&nbsp;</span><span style="font-size: 18px;">bagian dari program penjaminan mutu lulusan agar sesuai dengan kompetensi yang sudah ditetapkan oleh pemerintah&nbsp;</span><span style="font-size: 18px;">maupun kemenaker agar lulusan memiliki daya saing tinggi di dunia kerja. Standar kompetensi lulusan digunakan sebagai acuan utama pengembangan standar isi pembelajaran, standar proses pembelajaran, standar dosen dan tenaga kependidikan, standar sarana prasarana pembelajaran, standar pengelolaan&nbsp;</span><span style="font-size: 18px;">pembelajaran dan standar pembiayaan pembelajaran.</span></p>	<p style="text-align: justify; "><span style="font-size: 18px;">Pada pasal 5 ayat (1) Permendikbud RI no. 3 tahun 2022 tentang Standar Nasional Pendidikan Tinggi, menyatakan standar kompetensi lulusan merupakan kriteria minimal tentang kualifikasi kemampuan lulusan yang mencakup sikap, pengetahuan dan keterampilan yang dinyatakan dalam rumusan capaian pembelajaran lulusan.</span></p><p style="text-align: justify; "><span style="font-size: 18px;">Tujuan dari penetapan standar kompetensi lulusan adalahbagian dari program penjaminan mutu lulusan agar sesuai dengan kompetensi yang sudah ditetapkan oleh pemerintah maupun kemenaker agar lulusan memiliki daya saing tinggi di dunia kerja. Standar kompetensi lulusan digunakan sebagai acuan utama pengembangan standar isi pembelajaran, standar proses pembelajaran, standar dosen dan tenaga kependidikan, standar sarana prasarana pembelajaran, standar pengelolaan pembelajaran dan standar pembiayaan pembelajaran.</span></p><div><br></div>	<p><span style="font-size: 18px;">Sehubungan dengan lingkup capaian kompetensi lulusan, pihak-pihak yang bertanggung jawab sesuai dengan tugas dan wewenang yang terkait dengan aspek lulusan adalah :</span></p><ol><li><span style="font-size: 18px;">Rektor</span></li><li><span style="font-size: 18px;">Wakil Rektor Bidang Akademik</span></li><li><span style="font-size: 18px;">Dekan</span></li><li><span style="font-size: 18px;">Ketua Program Studi</span></li><li><span style="font-size: 18px;">Dosen</span></li><li><span style="font-size: 18px;">Tenaga Kependidikan</span></li><li><span style="font-size: 18px;">Mahasiswa</span></li></ol><div><br></div>	<ol><li>Standar Nasional Pendidikan Tinggi adalah satuan standar yang meliputi Standar Nasional Pendidikan, ditambah dengan standar penelitian dan standar pengabdian kepada masyarakat.</li><li>Kerangka Kualifikasi Nasional Indonesia (KKNI) adalah kerangka penjenjangan kualifikasi kompetensi yang dapat menyandingkan, menyetarakan dan mengintegrasikan antara bidang Pendidikan dan bidang pelatihan kerja serta pengalaman kerja dalam rangka pemberian pengakuan kompetensi kerja sesuai dengan struktur pekerjaan diberbagai sektor.</li><li>Kurikulum adalah seperangkat rencana dan pengaturan mengenai tujuan, isi dan bahan pelajaran serta cara yang digunakan sebagai pedoman penyelenggaraan kegiatan pembelajaran untuk mencapai Pendidikan Tinggi.</li><li>Pendidikan Tinggi adalah jenjang Pendidikan setelah pendidikan menengah yang mencakup program diploma, program sarjana, program magister, program doktor, program profesi, program spesialis yang diselenggarakan oleh perguruan tinggi berdasarkan kebudayaan bangsa Indonesia.</li><li>Standar kompetensi lulusan merupakan kriteria minimal tentang kualifikasi kemampuan lulusan yang mencakup sikap, pengetahuan dan keterampilan yang dinyatakan dalam rumusan capaian pembelajaran lulusan.</li><li>Universitas adalah Perguruan Tinggi yang terdiri dari sejumlah fakultas dan program studi yang menyelenggarakan Pendidikan akademik dan/atau professional dalam sejumlah disiplin ilmu tertentu.</li><li>Fakultas adalah organ universitas yang merupakan himpunan sumberdaya pendukung, yang dapat dikelompokkan menurut program studi yang menyelenggarakan dan mengelola metode akademik,vokasi atau profesi dalam satu rumpun disiplin ilmu pengetahuan, tekhnologi dan/atau seni.</li><li>Dosen adalah pendidik profesional dan ilmuwan dengan tugas utama mentransformasi, mengembangkan ilmu pengetahuan, teknologi melalui pendidikan, penelitian dan pengabdian kepada masyarakat.</li><li>Program studi adalah organ universitas yang melakukan koordinasi pengleolaan sumberdaya dan penjaminan mutu atas penyelenggaraan akademik, dalam satu disiplin dan/atau rumpun ilmu tertentu.</li><li>Tenaga Kependidikan adalah anggota masyarakat yang mengabdikan diri dan diangkat untuk menunjang penyelenggaraan pendidikan tinggi.</li><li>Mahasiswa adalah peserta didik pada jenjang pendidikan tinggi yang terdaftar dengan memenuhi persyaratan akademik serta administratif untuk mengikuti proses pendidikan di universitas.</li></ol><div><br></div><div><br></div>	1
\.


--
-- Data for Name: fakultas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.fakultas (id, nama) FROM stdin;
1	Teknologi Informasi
3	Ekonomi
4	Hukum
5	Pertanian
\.


--
-- Data for Name: indikator; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.indikator (id, standard_id, pegawai_id, isi, strategi, indikator, satuan, target, status) FROM stdin;
1	1	1	Kaprodi menyusun profil lulusan yang menjadi acuan dalam menyusun CP program studi.	Dekan dan Ketua Jurusan/Program Studi perlu membina hubungan dengan organisasi profesi, alumni, pemerintah, dan dunia usaha.	Profile lulusan yang menjadi acuan dalam menyusun CP program studi	%	50	1
2	1	1	Kaprodi menghasilkan lulusan yang cepat bekerja	Menyelenggarakan pelatihan yang berkaitan dengan proses pembelajaran bagi dosen.	Masa tunggu lulusan sampai dengan mendapatkan pekerjaan	%	50	1
3	1	1	Kaprodi menghasilkan lulusan yang bekerja dengan gaji yang memadai.	Ketua program studi mensosialisasikan pelaksanaan proses belajar mengajar sesuai kurikulum dan silabus masing- masing mata kuliah kepada seluruh komponen yang terlibat dalam proses pembelajaran Dosen, Tenaga Pendidik dan Mahasiswa).	Besar gaji yang diterima para lulusan pada awal bekerja	%	50	1
4	1	1	Kaprodi menghasilkan lulusan yang bekerja pada bidang yang sesuai dengan bidang keilmuannya.	BAU menjelaskan pada mahasiswa tentang kewajiban keuangan.	Kesesuaian bidang kerja lulusan dengan bidang ilmu Pendidikan	%	50	1
5	1	1	Kaprodi menghasilkan lulusan yang bekerja pada pekerjaan yang sesuai dengan tingkat pendidikannya	Dosen wali menjelaskan tentang persyaratan nilai minimal untuk kelulusan	Keselarasan vertikal antara beban pekerjaan dengan tingkat pendidipan para alumni	%	50	1
6	2	1	Kaprodi menyusun kurikulum perguruan tinggi (KPT) sebagai pedoman pelaksanaan pembelajaran di program studi	Perencanaan proses pembelajaran	Kurikulum perguruan tinggi (KPT) program studi	%	50	1
7	2	1	Kaprodi menyusun CP lulusan sesuai dengan profil lulusan yang sudah ditetapkan	Pelaksanaan proses pembelajaran	CP lulusan/CP program studi	%	50	1
8	2	1	Kaprodi menyusun Bahan kajian sebagai tindak lanjut dari CP lulusan yang telah ditetapkan	Pengawasan proses pembelajaran	Penyusunan bahan kajian	%	50	1
9	2	1	Kaprodi menyusun mata kuliah mengakomodasi bahan kajian yang telah ditetapkan	Evaluasi Proses Pembelajaran	Penyusunan mata kuliah	%	50	1
10	3	1	Kaprodi menyiapkan dokumen administrasi pembelajaran untuk semester berjalan	Pimpinan universitas menyelenggarakan tersedianya sarana dan prasarana pendukung proses pembelajaran yang kondusif ditingkat Universitas	Dokumen administrasi pembelajaran	%	50	1
11	3	1	Dosen PA mendampingi mahasiswa memprogram kegiatan kegiatan pembelajaran yang akan ditempuh pada semester berjalan	Dekan, ketua program studi menyelenggarakan koordinasi dengan dosen dan perwakilan mahasiswa untuk perencanaan, pelaksanaan dan evaluasi kegiatan pendukung proses pembelajaran yang kondusif\r\nditingkat Fakultas dan program studi	Beban pembelajaran mahasiswa pada semester berjalan	%	50	1
12	3	1	Dosen menyiapkan RPS dan kontrak kuliah untuk kegiatan pembelajaran yang akan diampu pada semester berjalan	Menyelenggarakan pelatihan yang berkaitan dengan proses pembelajaran bagi dosen	Dokumen/instrument persiapan pembelajaran	%	50	1
13	3	1	Dosen melaksanakan proses pembelajaran sesuai dengan yang terprogram dalam RPS dan kontrak kuliah.	Ketua program studi mensosialisasikan pelaksanaan proses belajar mengajar sesuai kurikulum dan silabus masing-masing mata kuliah kepada seluruh komponen yang terlibat dalam proses pembelajaran Dosen, Tenaga Pendidik dan Mahasiswa).	Proses Pembelajaran	%	50	1
14	4	1	Kaprodi menetapkan Teknik penilaian pembelajaran sebagai berikut: observasi, partisipasi, unjuk kerja, tes tertulis, tes lisan, angket)	Pimpinan universitas menyelenggarakan koordinasi dengan para pembantu dekan bidang akademik secara berkala.	Teknik penilaian pembelajaran	%	50	1
15	4	1	Kaprodi melaporkan hasil penilaian pembelajaran sesuai dengan sistem administrasi akademik.	Dekan, ketua program studi menyelenggarakan\r\nSosialisasi dan pelatihan untuk dosen yang berkaitan dengan metode dan mekanisme penilaian, prosedur penilaian, dan instrument penilaian.	Pelaporan hasil penilaian pembelajaran	%	50	1
16	4	1	Kaprodi menetapkan persyaratan kelulusan mahasiswa untuk dapat dinyatakan lulus dalam yudisium;	Mengintegrasikan data hasil penilaian kedalam Sistem Informasi Akademik universitas.	Persyaratan kelulusan yudisium mahasiswa	%	50	1
17	5	1	Kaprodi menjamin jumlah dosen tetap program studi mencukupi untuk kebutuhan pengembangan program studi;	Mendorong dan membuka kesempatan seluas-luasnya bagi Dosen dan tenaga kependidikan untuk melanjutkan pendidikan hingga jenjang doktor melalui program beasiswa internal maupun eksternal.	Jumlah dosen tetap program studi yang ber-NIDN	%	50	1
18	5	1	Kaprodi menjamin kualifikasi akademik (Pendidikan) dosen tetap program studi memenuhi persyaratan dalam pengembangan program studi;	Membuat blue print pembinaan karier dosen dan tenaga kependidikan dalam jangka panjang.	Jumlah dosen tetap program studi yang berijazah doctor linier dengan bidang studi	%	50	1
19	5	1	Kaprodi menjamin kualifikasi jabatan akademik fungsional dosen tetap program studi memenuhi peresyaratan dalam\r\npengembangan program studi;	Menyelenggarakan pelatihan secara periodic bagi dosen\r\ndan tenaga kependidikan untuk peningkatan kompetensi yang dibutuhkan.	Jumlah dosen tetap program studi yang berjabatan fungsional dosen lektor kepala atau professor	%	50	1
20	5	1	Kaprodi memberikan tugas pelaksanaan tridharma perguruan tinggi kepada dosen teap program studi untuk pengembangan karirnya;	.	Besar tugas/beban dosen dalam melaksanakan tridharma perguruan tinggi	%	50	1
21	6	1	Program studi menjamin tersedianya sarana prasarana pembelajaran yaitu ruang kelas, laboratorium, perpustakaan, ruang interaksi di luar perkuliahan, ruang seminar, ruang lobi, Kerjasama dengan mitra terkait pemenuhan sarana dan prasarana pembelajaran	Pimpinan universitas menyelenggarakan koordinasi dengan para dekan secara berkala	Ketersediaan sarana dan prasarana pembelajaran	%	50	1
22	6	1	Program studi menjamin kemudahan akses terhadap sarana dan prasarana pembelajaran	Pimpinan universitas dan fakultas membentuk tim pengelola aset untuk ditugasi merancang, membangun dan memelihara sarana dan prasarana sesuai dengan standar yang ditentukan.	Kemudahan akses sarana dan prasarana pembelajaran	%	50	1
23	6	1	Program studi menjamin ketercukupan kebutuhan sarana dan prasarana pembelajaran;	Pimpinan universitas dan fakultas bekerjasama dengan pihak ketiga atau lembaga donor dalam penyediaan sarana dan prasarana yang kebutuhannya mendesak dan belum teralokasi anggaran dari pemerintah.	Ketercukupan sarana dan prasarana pembelajaran	%	50	1
24	6	1	Program studi menjamin keberlanjutan ketersedian sarana dan prasarana pembelajaran	.	Keberlanjutan sarana dan prasara pembelajaran	%	50	1
25	7	1	Kaprodi\tmenyediakan\tpanduan\tpelaksanaan pembelajaran di lingkungan program studi	Pimpinan universitas menyelenggarakan koordinasi dengan pimpinan unit di bawahnya secara berkala untuk menjamin bahwa semua kegiatan berjalan sesuai dengan standard yang ditentukan.	Ketersediaan\tpanduan\tpelaksanaan\tpembelajaran\tdi lingkungan program studi	%	50	1
26	7	1	Kaprodi melaksanakan perencanaan pembelajaran di lingkungan program studi	Pimpinan    universitas     menyelenggarakan     pelatihan, penyegaran untuk menjaga kesetiakawanan, kerjasama dan toleransi diantara para pimpinan fakultas, program studi.	Persiapan pelaksanaan pembelajaran di awal semester	%	50	1
27	7	1	Kaprodi\tmelaksanakan\tmonitoring\tpelaksanaan pembelajaran di lingkungan program studi	.	Monitoring pembelajaran\tdilakukan pada pertengahan semester (minggu ke 8/minggu UTS)	%	50	1
28	7	1	Kaprodi\tmelaksakan\tevaluasi\tterhadap\tpelaksanaan pembelajaran di lingkungan program studi	.	Evaluasi pelaksanaan pembelajaran	%	50	1
29	8	1	Kaprodi menjamin adanya anggaran untuk menunjang pelaksanaan pembelajaran,	Pimpinan universitas menyelenggarakan koordinasi yang baik dengan seluruh fakultas, lembaga dan unit-unit yang ada dalam hal perencanaan, pengelolaan dan pertanggung jawaban seluruh penerimaan dan pengeluaran dana yang ada.	Ketersediaan anggaran untuk menunjang pelaksanaan pembelajaran	%	50	1
30	8	1	Kaprodi menjamin lancarnya realisasi anggaran untuk menunjang pelaksanaan pembelajaran	Pimpinan universitas melalui satuan pengawas internal (SPI) secara periodik dan berkelanjutan melakukan fungsi pengawasan dan audit internal keuangan.	Kelancaran realisasi anggaran untuk menunjang pelaksanaan pembelajaran	%	50	1
31	8	1	Kaprodi menjamin ketercukupinya angggaran untuk menunjang pelaksanaan pembelajaran;	Dalam rangka pemenuhan standar pembiayaan, diperlukan langkah efisiensi pengeluaran dan optimalisasi penerimaan.	Ketercukupan anggaran untuk menunjang pelaksanaan pembelajaran	%	50	1
32	8	1	Kaprodi menjamin keberlanjutan anggaran untuk menunjang pelaksanaan pembelajaran	.	Keberlanjutan anggaran untuk menunjang pelaksanaan pembelajaran	%	50	1
33	9	1	Dosen mengimplementasikan hasil penelitian dalam pengayaan materi pembelajaran dan pkm	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.	Hasil penelelitian dosen diimplementasikan dalam pembelajaran dan pkm	%	50	1
34	9	1	Dosen mempublikasikan hasil penelitian pada journa/pertemuan ilmiah internasional	Menyediakan\talokasi\tdana\tyang\tjelas,\tadanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Hasil penelitian dosen yang dipublikasikan dalam jurnal/pertemuan internasional	%	50	1
35	9	1	Dosen mempublikasikan hasil penelitian pada journal/pertemuan nasional	Melakukan pelatihan atau membekali sivitas akademika untuk menigkatkan kemampuan dalam melakukan kegiatan penelitian.	Hasil penelitian dosen yang dipublikasikan dalam jurnal/pertemuan nasional	%	50	1
36	9	1	Dosen mematenkan hasil penelitian untuk melindungi hak kekayaan intelektual	Melakukan kerja sama baik dengan lembaga eksternal seperti Perguruan Tinggi lain, Pemerintah Daerah, Industri maupun lembaga lain untuk melakukan penelitian.	Hasil penelitian dosen yang diajukan hak paten dan atau hak cipta	%	50	1
37	10	1	Dosen menyusun materi penelitian mengacu roadmap penelitian nasional dan roadmap institusi	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.	Kesesuaian materi penelitian dosen dengan roadmap research nasional dan institusi	%	50	1
38	10	1	Dosen\tmenyusun\tmateri\tpenelitian\tdalam\troadmap pribadi/kelompk dosen dan dilaksanakan secara konsisten	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Konsistensi dosen terhadap materi peneltian yang dilakukan	%	50	1
39	11	1	Dosen menyusun proposal sebagai acuan pelaksanaan penelitian	Melakukan sosialiasai Pedoman Penelitian dan Pengabdian Kepada Masyarakat Universitas Merdeka Pasuruan kepada seluruh sivitas akademika, sehingga seluruh sivitas akademika	Proposal penelitian dosen	%	50	1
40	11	1	Dosen menyeminarkan hasil penelitian untuk penyempurnaan laporan dan penyusunan luaran	LPPM menyusun kalender kegiatan penelitian dan mensosialisasikan kepada sivitas akademika sehingga pelaksana dapat menyusun rencana kegiatan sesuai dengan kalender kegiatan LPPM.	Seminar hasil penelitian dosen	%	50	1
41	11	1	Dosen menyusun luaran hasil penelitian	Melakukan pelatihan atau Workshop untuk meningkatkan kempampuan sivitas akademika dalam melakukan proses kegiatan penelitian.	Penyusunan luaran hasil penelitian dosen	%	50	1
42	11	1	Dosen mempertanggungjawabkan pelaksanaan penelitian baik secara materi maupun anggaran	Universitas merdeka Pasuruan menciptakan iklim yang kondusif agar dosen dan mahasiswa secara kreatif dan inovatif menyediaka peran dan fungsinya sehingga pelaku utama penelitian yang bermutu dan terencana.	Pertanggungjawaban pelaksanaan penelitian dosen	%	50	1
43	12	1	Kaprodi\tmelakukan\tmonitoring\tdan\tevaluasi\tpelaksanaan penelitian dosen	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.	Kegiatan\tmonitoring dan evaluasi pelaksanaan penelitian dosen	%	50	1
44	12	1	Kaprodi melaporkan hasil evaluasi pelaksanaan penelitian pada rapat pleno program studi	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Laporan hasil evaluasi pelaksanaan penelitian dosen	%	50	1
45	13	1	Dosen berusaha mempunyai rekam jejak sebagai gambaran kompetensi sebagai peneliti	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.	Rekam jejak dosen sebagai peneliti	%	50	1
46	13	1	Dosen memiliki sertifikasi kompetensi atau rekognisi dibidang penelitian	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Kepemilikan sertifikat kompetensi atau rekognisi di bidang penelitian	%	50	1
47	14	1	Kaprodi menjamin tersedianya sarana dan prasara pelaksanaan penelitian	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.	Ketersediaan sarana dan prasarana penelitian	%	50	1
48	14	1	Kaprodi menjamin kemudahan akses sarana dan prasarana\r\npelaksanaan penelitian	Menyediakan\talokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari Universitas.	Kemudahan akses sarana dan prasarana penelitian	%	50	1
49	15	1	Kaprodi menyusun rencana induk pengembangan penelitian sebagai acuan bagi dosen dalam pelaksanaan penelitian	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.	Keberadaan rencana induk penelitian prodi	%	50	1
50	15	1	Kaprodi mengusahakan adanya pedoman pelaksanaan penelitian bagi dosen.	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari Universitas.	Keberadaan pedoman pelaksanaan penelitian dosen	%	50	1
51	15	1	Kaprodi\tmelakukan\tevaluasi\tpelaksanaan\tpenelitian\tdi lingkungan prodi	Melakukan pelatihan atau membekali sivitas akademika untuk meningkatkan kemampuan dalam melakukan kegiatan penelitian.	Kaprodi melakukan evaluasi atas ketercapaian roadmap penelitian prodi	%	50	1
52	16	1	Kaprodi   menjamin\ttersedianya\tpembiayaan\tpenelitian\tdi lingkungan prodi	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.	Ketersediaan dana penelitian bagi dosen	%	50	1
53	16	1	Kaprodi menjamin kemudahan akses pembiayaan penelitian di lingkungan prodi	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari Universitas.	Kemuadahan akses pembiayaan penelitian dosen	%	50	1
54	17	1	Dosen mengimplementasikan hasil pkm dalam pengayaan materi pembelajaran dan penelitian	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.	Hasil pkm dosen diimplementasikan dalam pembelajaran dan pkm	%	50	1
55	17	1	Dosen mempublikasikan hasil pkm pada journal/pertemuan nasional	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Hasil pkm dosen yang dipublikasikan dalam jurnal/pertemuan nasional	%	50	1
56	18	1	Dosen menyusun materi pkm mengacu roadmap pkm nasional dan roadmap institusi	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.	Kesesuaian materi pkm dosen dengan roadmap pkm institusi	%	50	1
57	18	1	Dosen menyusun materi pkm dalam roadmap pribadi/kelompok dosen dan dilaksanakan secara konsisten	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Konsistensi dosen terhadap materi pkm yang dilakukan	%	50	1
58	19	1	Dosen menyusun proposal sebagai acuan pelaksanaan pkm	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.	Proposal pkm dosen	%	50	1
59	19	1	Dosen menyeminarkan hasil pkm untuk penyempurnaan laporan dan penyusunan luaran;	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Seminar hasil pkm dosen	%	50	1
60	19	1	Dosen menyusun luaran hasil pkm	Melakukan pelatihan atau membekali sivitas akademika untuk menigkatkan kemampuan dalam melakukan kegiatan Pengabdian Kepada Masyarakat.	Penyusunan luaran hasil pkm dosen	%	50	1
61	19	1	Dosen mempertanggungjawabkan pelaksanaan pkm baik secara materi maupun anggaran	Melakukan kerja sama baik dengan lembaga eksternal seperti Perguruan Tinggi lain, Pemerintah Daerah, Industri maupun lembaga lain untuk melakukan Pengabdian Kepada Masyarakat.	Pertanggungjawaban pelaksanaan pkm dosen	%	50	1
62	20	1	Kaprodi melakukan monitoring dan evaluasi pelaksanaan pkm dosen	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.	Kegiatan monitoring dan evaluasi pelaksanaan pkm dosen	%	50	1
63	20	1	Kaprodi melaporkan hasil evaluasi pelaksanaan pkm pada rapat pleno program studi	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Laporan hasil evaluasi pelaksanaan pkm dosen	%	50	1
64	21	1	Dosen berusaha mempunyai rekam jejak sebagai gambaran kompetensi sebagai peneliti	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.	Rekam jejak dosen sebagai pelaksana pkm	%	50	1
65	21	1	Dosen memiliki sertifikasi kompetensi atau rekognisi dibidang Pkm	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Kepemilikan sertifikat kompetensi atau rekognisi di bidang pkm	%	50	1
66	22	1	Kaprodi menjamin tersedianya sarana dan prasara pelaksanaan pkm	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.	Ketersediaan sarana dan prasarana pkm	%	50	1
67	22	1	Kaprodi menjamin kemudahan akses sarana dan prasarana pelasanaan pkm	Menyediakan alokasi dana yang jelas, untuk pengembangan sarana dan prasarana Pengabdian Kepada Masyarakat yang juga dapat digunakan untuk proses pembelajaran dan kegiatan\r\npenelitian.	Kemudahan akses sarana dan prasarana pkm	%	50	1
68	23	1	Kaprodi menyusun rencana induk pengembangan pkm sebagai acuan bagi dosen dalam pelaksanaan pkm	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.	Keberadaan rencana induk pkm prodi	%	50	1
69	23	1	Kaprodi mengusahakan adanya pedoman pelaksanaan pkm bagi dosen	Menyediakan alokasi   dana   yang   jelas,   adanya   kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Keberadaan pedoman pelaksanaan pkm dosen	%	50	1
70	23	1	Kaprodi melakukan evaluasi pelaksanaan pkm di lingkungan Prodi	Melakukan pelatihan atau membekali sivitas akademika untuk menigkatkan kemampuan dalam melakukan kegiatan Pengabdian Kepada Masyarakat.	Kaprodi melakukan evaluasi atas ketercapaian roadmap pkm prodi	%	50	1
71	24	1	Kaprodi menjamin tersedianya pembiayaan pkm di lingkungan prodi	Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.	Ketersediaan dana pkm bagi dosen	%	50	1
72	24	1	Kaprodi menjamin kemudahan akses pembiayaan pkm di lingkungan prodi	Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.	Kemudahan akses pembiayaan pkm dosen	%	50	1
\.


--
-- Data for Name: indikator_jenis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.indikator_jenis (id, jenis_id, indikator_id) FROM stdin;
\.


--
-- Data for Name: jenis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jenis (id, nama, status) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2019_12_14_000001_create_personal_access_tokens_table	1
2	2023_12_26_031641_create_permission_tables	1
\.


--
-- Data for Name: model_has_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.model_has_permissions (permission_id, model_type, model_id) FROM stdin;
\.


--
-- Data for Name: model_has_roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.model_has_roles (role_id, model_type, model_id) FROM stdin;
1	App\\Models\\User	1
11	App\\Models\\User	2
11	App\\Models\\User	3
11	App\\Models\\User	4
11	App\\Models\\User	5
12	App\\Models\\User	6
12	App\\Models\\User	7
12	App\\Models\\User	8
12	App\\Models\\User	9
12	App\\Models\\User	10
13	App\\Models\\User	11
13	App\\Models\\User	12
13	App\\Models\\User	13
13	App\\Models\\User	14
13	App\\Models\\User	15
13	App\\Models\\User	16
13	App\\Models\\User	17
13	App\\Models\\User	18
\.


--
-- Data for Name: nilai; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.nilai (id, indikator_id, deskripsi, nilai, status) FROM stdin;
1	1	Bila profile disusun mengacu pada visi, misi, dan kebutuhan stake holder	4	1
2	1	Bila profile disusun mengacu pada visi dan misi atau pada kebutuhan stake holder	3	1
3	1	Bila profile disusun tanpa acuan yang jelas	2	1
4	1	Bila tidak ada profile lulusan	1	1
5	2	Bila masa tunggu lulusan < 3 bulan	4	1
6	2	Bila masa tunggu lulusan > 3 – 6 bulan	3	1
7	2	Bila masa tunggu lulusan > 6 – 9 bulan	2	1
8	2	Bila masa tunggu lulusan > 9 bulan	1	1
9	3	Bila gaji awal > 2 UMR	4	1
10	3	Bila gaji awal >1,5-2 UMR	3	1
11	3	Bila gaji awal > 1-1,5 UMR	2	1
12	3	Bila gaji awal ≤ UMR	1	1
13	4	Bila yang erat dan sangat erat >80%	4	1
14	4	Bila yang erat dan sangat erat > 60 – 80%	3	1
15	4	Bila yang erat dan sangat erat >40 – 60%	2	1
16	4	Bila yang erat dan sangat erat >20 – 40%	1	1
17	5	Bila yang setingkat atau sama >80%	4	1
18	5	Bila yang setingkat atau sama > 60 – 80%	3	1
19	5	Bila yang setingkat atau sama >40 – 60%	2	1
20	5	Bila yang setingkat atau sama >20 – 40%	1	1
21	6	Bila penyusunan KPT mengacu pada KKNI dan melibatkan stakeholder internal dan eksternal	4	1
22	6	Bila penyusunan KPT mengacu pada KKNI hanya melibatkan stakeholder internal	3	1
23	6	Bila penyusunan KPT hanya melibatkan stakeholder internal	2	1
24	6	Bila penyusunan KPT tidak melibatkan pihak lain	1	1
25	7	Bila CP lulusan mengacu hasil kesepakatan asosiasi prodi yang sudah disahkan Menteri dan\r\nkarakteristik institusi	4	1
26	7	Bila CP lulusan mengacu pada kesepakatan prodi sejenis dan karakteristik institusi	3	1
27	7	Bila CP lulusan menjabarkan sendiri dari kebutuhan pasar dan karakteristik institusi	2	1
28	7	Bila CP lulusan disusun tanpa acuan yang jelas	1	1
29	8	Bila semua CP lulusan secara sistematik telah ditentukan bahan kajiannya	4	1
30	8	Bila semua CP lulusan telah ditentukan bahan kajiannya	3	1
31	8	Bila baru 75% CP lulusan telah ditentukan bahan kajiannya	2	1
32	8	Bila baru sebagian CP lulusan telah ditentukan bahan kajiannya	1	1
33	9	Bila semua BK secara sistematik telah diakomodasi dalam mata kuliah	4	1
34	9	Bila semua BK lulusan telah diakomodasi dalam mata kuliah	3	1
35	9	Bila baru 75% BK lulusan telah diakomodasi mata kuliahnya	2	1
36	9	Bila penyusunan mata kuliah tidak memperhatikan BK	1	1
37	10	Bila pada awal semester telah disiapkan pedoman akademik, kalender akademik dan jadwal perkuliahan	4	1
38	10	Bila pada awal semester telah disiapkan dua diantara pedoman akademik, kalender akademik dan jadwal perkuliahan	3	1
39	10	Bila pada awal semester telah disiapkan satu diantara pedoman akademik, kalender akademik dan jadwal perkuliahan	2	1
40	10	Bila tidak ada tiga-tiganya	1	1
41	11	Semua mahasiswa aktif memrogram KRS tepat waktu, dengan beban sks sesuai dengan ketentuan	4	1
42	11	Bila semua mahasiswa aktif memrogram KRS tidak tepat waktu, dengan beban sks sesuai dengan ketentuan	3	1
43	11	Bila semua mahasiswa aktif memrogram KRS tidak tepat waktu, dengan beban sks ada maksimum 10% mahasiswa tidak sesuai dengan ketentuan	2	1
44	11	Bila semua mahasiswa aktif memrogram KRS tidak tepat waktu, dengan beban sks lebih dari 10% mahasiswa tidak sesuai dengan ketentuan	1	1
45	12	Bila seluruh dosen mengupdate RPS dan kontrak kuliah pada awal semester	4	1
46	12	Bila seluruh dosen menyiapkan RPS dan kontrak kuliah namun sebagian tidak diupdate\r\npada awal semester	3	1
47	12	Bila sebagaian dosen (≤ 25%) tidak ada RPS dan kontrak kuliah pada awal semester	2	1
48	12	Bila sebagian dosen (> 25%) tidak ada RPS dan kontrak kuliah pada awal semester	1	1
49	13	Bila proses pembelajaran menerapkan semua bentuk pembelajaran (diskusi, praktek kerja,\r\npraktikum, magang, project research, demonstrasi, dan kuliah)	4	1
50	13	Bila proses pembelajaran menerapkan 5 bentuk pembelajaran (diskusi, praktek kerja,\r\npraktikum, magang, project research, demonstrasi, dan kuliah)	3	1
51	13	Bila proses pembelajaran menerapkan 3 bentuk pembelajaran (diskusi, praktek kerja, praktikum, magang, project research, demonstrasi, dan kuliah)	2	1
52	13	Bila proses pembelajaran menerapkan hanya satu bentuk pembelajaran (diskusi, praktek kerja, praktikum, magang, project research, demonstrasi, dan kuliah)	1	1
53	14	Bila > 75% dosen menggunakan sedikitnya 3 teknik penilaian pembelajaran	4	1
54	14	Bila > 50-75% dosen menggunakan sedikitnya 3 teknik penilaian pembelajaran;	3	1
55	14	Bila > 25-50% dosen menggunakan sedikitnya 3 teknik penilaian pembelajaran;	2	1
56	14	Bila ≤ 25% dosen menggunakan sedikitnya 3 teknik penilaian pembelajaran;	1	1
57	15	Bila entry nilai oleh dosen, penerbitan KHS dan penerbitan transkrip nilai lulusan sudah terintegrasi dilakukan secara on line;	4	1
58	15	Bila baru dua diantara entry nilai oleh dosen, penerbitan KHS dan penerbitan transkrip nilai lulusan sudah terintegrasi dilakukan secara on line;	3	1
59	15	Bila entry nilai oleh dosen, penerbitan KHS dan penerbitan transkrip nilai lulusan belum terintegrasi namun sudah secara on line;	2	1
60	15	Bila entry nilai oleh staf akademik, penerbitan KHS dan penerbitan transkrip nilai lulusan masih manual;	1	1
61	16	Bila persyaratan lulus yudisim mahasiswa IPK ≥ 2,75, tidak ada nilai D dan E;	4	1
62	16	Bila persyaratan lulus yudisim mahasiswa IPK ≥ 2,5 tidak ada nilai D dan E	3	1
63	16	Bila persyaratan lulus yudisim mahasiswa IPK ≥ 2,0, tidak ada nilai D dan E	2	1
64	16	Bila persyaratan lulus yudisim mahasiswa IPK ≥ 2,0, tidak ada E, dan masih ada toleransi adanya nilai D;	1	1
65	17	Bila jumlah DTPS > 10 dan rasio dengan mahasiswa 15-25	4	1
66	17	Bila jumlah DTPS > 7-10 dan rasio dengan mahasiswa 10-15 atau 25-35	3	1
67	17	Bila jumlah DTPS ≥ 5-7 dan rasio dengan mahasiswa 5-10 atau 35-45	2	1
68	17	Bila jumlah DTPS <5 dan rasio dengan mahasiswa <5 atau >45	1	1
69	18	Bila jumlah Dosen doktor > 60% DTPS	4	1
70	18	Bila jumlah Dosen doktor >30-60% DTPS	3	1
71	18	Bila jumlah Dosen doktor >0 -30% DTPS	2	1
72	18	Bila jumlah Dosen doctor = 0% DTPS	1	1
73	19	Bila jumlah LK dan professor > 60% DTPS	4	1
74	19	Bila jumlah LK dan professor >30-60% DTPS	3	1
75	19	Bila jumlah LK dan professor >0-30% DTPS	2	1
76	19	Bila jumlah LK dan professor = 0% DTPS	1	1
77	20	Bila tugas dosen 10-14 sks EWMP	4	1
78	20	Bila tugas dosen .>14-17 atau <10-7 sks EWMP	3	1
79	20	Bila tugas dosen >17 -20 atau <7 -4 sks EWMP	2	1
80	20	Bila tugas dosen >20 atau <4 sks EWMP	1	1
81	21	Bila ketersediaan jenis sarana dan prasarana pembelajaran >80-100% dari yang dibutuhkan	4	1
82	21	Bila ketersediaan jenis sarana dan prasarana pembelajaran >60-80% dari yang dibutuhkan tersedia	3	1
83	21	bila ketersediaan jenis sarana dan prasarana pembelajaran >40-60% yang dibutuhkan tersedia	2	1
84	21	Bila ketersediaan jenis sarana dan prasarana pembelajaran ≤ 40% dari yang dibutuhkan	1	1
85	22	Bila tersedia prosedur penggunaan sarana dan prasarana pembelajaran yang mudah dan sederhana;	4	1
86	22	Bila tersedia prosedur penggunaan sarana dan prasarana pembelajaran yang kurang fleksibel sehingga kadang dapat menganggu\r\npelaksanaan pembelajaran	3	1
87	22	Bila tersedia prosedur penggunaan sarana dan prasarana pembelajaran tidak konsisten sehingga sering menganggu pelaksanaan pembelajaran	2	1
88	22	Bila tidak ada prosedur baku dalam penggunaan sarana dan parasarana	1	1
89	23	Bila sarana dan prasarana dalam jumlah >80-100% mencukupi dan dalam keadaan baik siap untuk digunakan	4	1
90	23	Bila sarana dan prasarana dalam jumlah >60- 80% mencukupi dan dalam keadaan baik siap untuk digunakan	3	1
91	23	Bila sarana dan prasarana dalam jumlah >40- 60% mencukupi dan dalam keadaan baik siap untuk digunakan	2	1
92	23	Bila sarana dan prasarana dalam jumlah ≤ 40% mencukupi dan dalam keadaan baik siap untuk digunakan	1	1
93	24	Bila ada perawatan rutin dan rencana investasi pengembangan sarana dan parasarana	4	1
94	24	Bila ada perawatan rutin dan pengembangan tergantung hibah/bantuan eksternal	3	1
95	24	Bila ada perawatan rutin,  namun tidak ada pengembangan	2	1
96	24	Bila tidak ada perawatan rutin dan tidak ada pengembangan	1	1
97	25	Bila panduan pelaksanaan pembelajarandi program studi memuat semua aspek pembelajaran tersedia sebelum pembelajaran semester dimulai,	4	1
98	25	Bila panduan pelaksanaan pembelajaran program studi memuat sebagian besar aspek pembelajaran tersedia sebelum pembelajaran semester dimulai,	3	1
99	25	Bila Panduan pelaksanaan pembelajaran parsial tersedia pada saat kegiatan pembelajaran akan dimulai	2	1
100	25	Bila tidak ada panduan pembelajaran	1	1
101	26	Bila ploting dosen pengampu dan jadwal kuliah sudah disosialisasikan sebelum masa program KRS;	4	1
102	26	Bila ploting dosen pengampu dan jadwal kuliah baru disosialisasikan pada masa program KRS;	3	1
103	26	Bila ploting dosen pengampu dan jadwal kuliah tidak pernah disosialisasikan	2	1
104	26	Bila ploting dosen pengampu dan jadwal kuliah masih\tberubah-ubah sampai pembelajaran dimulai;	1	1
105	27	Bila jumlah tatap muka dosen 100% dan pelaksanaan pembelajaran sesuai RPS	4	1
106	27	Bila jumlah tatap muka dosen 100% dan pelaksanaan pembelajaran ada yang tidak sesuai RPS	3	1
107	27	Bila jumlah tatap muka dosen <100% dan pelaksanaan pembelajaran ada yang tidak sesuai RPS	2	1
108	27	Bila tidak dilakukan monitoring pelaksanaan pembelajaran	1	1
109	28	Bila pembelajaran telah dievaluasi (dengan angket), data telah dianalisis dan rata-rata skor dosen > 3,60	4	1
110	28	Bila pembelajaran telah dievaluasi (dengan angket), data telah dianalisis dan rata-rata skor dosen 3,00 - 3,60	3	1
111	28	Bila pembelajaran telah dievaluasi (dengan angket) namun data belum dianalisis atau telah dianalisis rata-rata skor dosen < 3,00	2	1
112	28	Bila pembelajaran tidak dilakukan evaluasi dengan angket, atau tidak dilakukan evaluasi sama sekali	1	1
113	29	Bila dana untuk pelaksanaan pembelajaran sudah masuk dalam agenda kerja tahunan dan telah mempunyai mata anggaran yang tetap (baku)	4	1
114	29	Bila dana untuk pelaksanaan pembelajaran sudah masuk dalam agenda kerja tahunan dan masuk dalam mata anggaran tentatif	3	1
115	29	Bila dana untuk pelaksanaan pembelajaran belum masuk dalam agenda kerja tahunan dan belum mempunyai mata anggaran tersendiri	2	1
116	29	Bila anggaran untuk pelaksanaan pembelajaran tidak masuk dalam perencanaan kegiatan institusi	1	1
117	30	Bila tersedia prosedur pencairan anggaran pembelajaran yang mudah dan sederhana;	4	1
118	30	Bila tersedia prosedur pencairan anggaran pembelajaran yang kurang fleksibel sehingga kadang dapat menganggu pelaksanaan pembelajaran	3	1
119	30	Bila tersedia prosedur pencairan anggaran pembelajaran tidak konsisten sehingga sering menganggu pelaksanaan pembelajaran	2	1
120	30	Bila tidak ada prosedur baku dalam pencairan anggaran pembelajaran sehingga pelaksanaan pembelajaran terganggu	1	1
121	31	Bila >80-100% kebutuhan anggaran yang diusulkan disetujui dan direalisasikan	4	1
122	31	Bila > 60-80% kebutuhan anggaran yang diusulkan disetujui dan direalisasikan	3	1
123	31	Bila >40- 60% kebutuhan anggaran yang diusulkan disetujui dan direalisasikan	2	1
124	31	Bila ≤ 40% kebutuhan anggaran yang diusulkan disetujui dan direalisasikan	1	1
125	32	Bila ada usaha pengembangan sumber pendanaan dari kegiatan pembelajaran dan bersumber selain dari mahasiswa;	4	1
126	32	Bila ada usaha pengembangan sumber pendanaan yang bersumber selain dari mahasiswa;	3	1
127	32	bila sumber pendanaan anggaran program studi selama 5 tahun terakhir stabil tidak pewrnah defisit;	2	1
128	32	Bila sumber pendanaan tidak stabil tidak bisa menjamin terpenuhinya dana yang sudah dianggarkan	1	1
129	33	Bila > 75 % hasil penelelitian dosen diimplementasikan dalam pembelajaran dan pkm	4	1
130	33	Bila > 50-75% hasil penelelitian dosen diimplementasikan dalam pembelajaran dan pkm	3	1
131	33	Bila > 25 -50% hasil penelelitian dosen diimplementasikan dalam pembelajaran dan pkm	2	1
132	33	Bila ≤ 25% hasil penelelitian dosen diimplementasikan dalam pembelajaran dan pkm	1	1
133	34	Bila > 75% hasil penelitian dipublikasikan dalam jurnal/pertemuan internasional	4	1
134	34	Bila > 50-75% hasil penelitian dipublikasikan dalam jurnal/pertemuan internasional	3	1
135	34	Bila > 25-50% hasil penelitian dipublikasikan dalam jurnal/pertemuan internasional	2	1
137	35	Bila > 75% hasil penelitian dipublikasikan dalam jurnal/pertemuan nasional	4	1
138	35	Bila > 50-75% hasil penelitian dipublikasikan dalam jurnal/pertemuan nasional	3	1
139	35	Bila > 25-50% hasil penelitian dipublikasikan dalam jurnal/pertemuan nasional	2	1
140	35	Bila ≤ 25% hasil penelitian dipublikasikan dalam jurnal/pertemuan nasional	1	1
141	36	Bila > 75% hasil penelitian diajukan hak paten dan atau hak cipta	4	1
142	36	Bila > 50-75% hasil penelitian diajukan hak paten dan atau hak cipta	3	1
143	36	Bila > 25-50% hasil penelitian diajukan hak paten dan atau hak cipta	2	1
144	36	Bila ≤ 25% hasil penelitian diajukan hak paten dan atau hak cipta	1	1
145	37	Bila materi penelitian >75% sesuai dengan roadmap research nasional dan institusi	4	1
146	37	Bila materi penelitian >50-75% sesuai dengan roadmap research nasional dan institusi	3	1
147	37	Bila materi penelitian > 25-50% sesuai dengan roadmap research nasional dan institusi	2	1
148	37	Bila materi penelitian ≤25% sesuai dengan roadmap research nasional dan institusi	1	1
149	38	Bila >75% penelitian dosen sesuai/konsisten dengan roadmap penelitian dosen yang bersangkutan;	4	1
150	38	Bila >50-75% penelitian dosen sesuai/konsisten dengan roadmap penelitian dosen yang bersangkutan	3	1
151	38	Bila >25-50% penelitian dosen sesuai/konsisten dengan roadmap penelitian dosen yang bersangkutan	2	1
152	38	Bila ≤25% penelitian dosen sesuai/konsisten dengan roadmap penelitian dosen yang bersangkutan	1	1
153	39	Bila setiap akan melakukan penelitian proposal disetujui program studi dan diseminarkan untuk mencari masukan dan sinkronisasi dengan program institusi	4	1
154	39	Bila setiap akan melakukan penelitian proposal disetujui program studi namun tidak harus diseminarkan untuk mencari masukan dan sinkronisasi dengan program institusi	3	1
155	39	Bila setiap akan melakukan proposal disetujui program studi\tnamun\ttidak\tdiseminarkan\tuntuk\tmencari masukan dan sinkronisasi dengan program institusi	2	1
156	39	Bila setiap akan melakukan penelitian proposal tidak dikoordinasikan dengan program studi	1	1
157	40	Bila >75% hasil penelitian diseminarkan untuk mendapatkan masukan dan koreksi	4	1
158	40	Bila > 50-75% hasil penelitian diseminarkan untuk mendapatkan masukan dan koreksi	3	1
159	40	Bila >25-50% hasil penelitian diseminarkan untuk mendapatkan masukan dan koreksi	2	1
160	40	Bila ≤25% hasil penelitian diseminarkan untuk mendapatkan masukan dan koreksi	1	1
161	41	Bila >75% penelitian ada luarannya (publikasi, TTG,HaKi dll)	4	1
162	41	Bila >50-75% penelitian ada luarannya (publikasi, TTG,HaKi dll)	3	1
163	41	Bila >25-50% penelitian ada luarannya (publikasi, TTG, HaKi dll)	2	1
164	41	Bila ≤25% penelitian ada luarannya (publikasi, TTG,HaKi dll)	1	1
165	42	Bila >75% penelitian dosen ada laporan pelaksanaan penelitian\tdan pertanggungjawaban\tanggaran penelitian.	4	1
166	42	Bila >50-75% penelitian dosen ada laporan pelaksanaan penelitian dan pertanggungjawaban anggaran penelitian	3	1
167	42	Bila >25-50% penelitian dosen ada laporan pelaksanaan penelitian dan pertanggungjawaban anggaran penelitian	2	1
168	42	Bila ≤25% penelitian dosen ada laporan pelaksanaan penelitian dan pertanggungjawaban anggaran penelitian	1	1
169	43	Bila\t>75% penelitian dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak	4	1
170	43	Bila >50-75% penelitian dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak	3	1
171	43	Bila >25-50% penelitian dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak	2	1
172	43	Bila ≤25% penelitian dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak	1	1
173	44	Bila hasil monev penelitian diumumkan dan ditindaklanjuti untuk perbaikan penelitian yang akan datang;	4	1
174	44	Bila hasil monev penelitian diumumkan dan tindak lanjutnya tidak dimonitor;	3	1
175	44	Bila hasil monev penelitian tidak diumumkan kepada peneliti;	2	1
176	44	Bila monev penelitian tidak jelas	1	1
177	45	Bila dosen mempunyai publikasi hasil penelitian dalam jurnal/buku referensi/monograf/hak paten rata- rata ≥3	4	1
178	45	Bila dosen mempunyai publikasi hasil penelitian dalam jurnal/buku referensi/monograf/hak paten rata- rata ≥2	3	1
179	45	Bila dosen mempunyai publikasi hasil penelitian dalam jurnal/buku referensi/monograf/hak paten rata- rata ≥1	2	1
180	45	bila dosen mempunyai publikasi hasil penelitian dalam jurnal/buku referensi/monograf/hak paten rata-rata <1	1	1
181	46	Bila >50% dosen mempunyai sertifikat kompetensi dan pernah diundang sebagai narasumber dalam pelaksanaan penelitian	4	1
182	46	Bila >50% dosen mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan penelitian	3	1
183	46	Bila ada dosen yang mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan penelitian	2	1
184	46	Bila tidak ada dosen yang mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan penelitian.	1	1
185	47	Bila ketersediaan jenis sarana dan prasarana penelitian >80-100% dari yang dibutuhkan	4	1
186	47	Bila ketersediaan jenis sarana dan prasarana penelitian >60-80% dari yang dibutuhkan tersedia	3	1
187	47	Bila ketersediaan jenis sarana dan prasarana penelitian >40-60% yang dibutuhkan tersedia	2	1
188	47	Bila ketersediaan jenis sarana dan prasarana penelitian ≤ 40% dari yang dibutuhkan	1	1
189	48	Bila tersedia prosedur penggunaan sarana dan prasarana penelitian yang mudah dan sederhana;	4	1
190	48	Bila tersedia prosedur penggunaan sarana dan prasarana penelitian yang kurang fleksibel sehingga kadang dapat menganggu pelaksanaan penelitian	3	1
191	48	Bila tersedia prosedur penggunaan sarana dan prasarana penelitian tidak konsisten sehingga sering menganggu pelaksanaan penelitian	2	1
192	48	Bila tidak ada prosedur baku dalam penggunaan sarana dan parasarana	1	1
193	49	Bila telah disusun rencana induk penelitian prodi, disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen;	4	1
194	49	Bila telah disusun rencana induk penelitian prodi, tidak disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen	3	1
195	49	Bila telah disusun rencana induk penelitian prodi, tidak disahkan (dituangkan dalam SK) dan tidak disosialisasikan kepada	2	1
196	49	Bila belum disusun rencana induk penelitian prodi	1	1
197	50	Bila telah disusun pedoman pelaksanaan penelitian prodi, disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen;	4	1
198	50	Bila telah disusun pedoman pelaksanaan penelitian prodi, tidak disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen	3	1
199	50	Bila telah disusun pedoman pelaksanaan penelitian prodi, tidak disahkan (dituangkan dalam SK) dan tidak disosialisasikan kepada dosen	2	1
200	50	Bila belum disusun pedoman pelaksanaan penelitian prodi	1	1
201	51	Bila hasil evaluasi ketercapaian roapmap penelitian prodi diumumkan dan ditindaklanjuti ;	4	1
202	51	Bila hasil evaluasi ketercapaian roapmap penelitian prodi diumumkan namun tindak lanjutnya tidak jelas	3	1
203	51	Bila hasil evaluasi ketercapaian roapmap penelitian prodi tidak diumumkan	2	1
204	51	Bila evaluasi ketercapaian roapmap penelitian prodi tidak dilakukan;	1	1
205	52	Bila >75% pendanaan penelitian dosen berasal dari eksternal Unmer Pasuruan	4	1
206	52	Bila > 50-75% pendanaan penelitian dosen berasal dari eksternal Unmer Pasuruan	3	1
207	52	Bila >25-50% pendanaan penelitian dosen berasal dari eksternal Unmer Pasuruan	2	1
208	52	Bila ≤25% pendanaan penelitian dosen berasal dari eksternal Unmer Pasuruan	1	1
209	53	Bila ada sosialisasi panduan dan Lembaga memfasilitasi untuk akses pendanaan eksternal dengan menyediakan dana pendamping	4	1
210	53	Bila ada sosialisasi panduan dan Lembaga memfasilitasi untuk akses pendanaan eksternal namun tidak menyediakan dana pendamping.	3	1
211	53	Bila hanya ada sosialisasi panduan akses dana eksternal (misalnya hibah)	2	1
212	53	Bila tidak pernah ada sosialisasi panduan akses dana eksternal	1	1
213	54	Bila > 75 % hasil pkm dosen diimplementasikan dalam pembelajaran dan penelitian	4	1
214	54	Bila > 50-75% hasil pkm dosen diimplementasikan dalam pembelajaran dan penelitian	3	1
215	54	Bila > 25 -50% hasil pkm dosen diimplementasikan dalam pembelajaran dan penelitian	2	1
216	54	Bila ≤ 25% hasil pkm dosen diimplementasikan dalam pembelajaran dan penelitian	1	1
217	55	Bila > 75% hasil pkm dipublikasikan dalam jurnal/pertemuan nasional	4	1
218	55	Bila > 50-75% hasil pkm dipublikasikan dalam jurnal/pertemuan nasional	3	1
219	55	Bila > 25-50% hasil pkm dipublikasikan dalam jurnal/pertemuan nasional	2	1
220	55	Bila ≤ 25% hasil pkm dipublikasikan dalam jurnal/pertemuan nasional	1	1
221	56	Bila materi pkm >75% sesuai dengan roadmap pkm institusi	4	1
222	56	Bila materi pkm >50-75% sesuai dengan roadmap pkm institusi	3	1
223	56	Bila materi pkm > 25-50% sesuai dengan roadmap pkm institusi	2	1
224	56	Bila materi pkm ≤25% sesuai dengan roadmap pkm institusi	1	1
225	57	Bila >75% pkm dosen sesuai/konsisten dengan roadmap pkm dosen yang bersangkutan;	4	1
226	57	Bila >50-75% pkm dosen sesuai/konsisten dengan roadmap pkm dosen yang bersangkutan	3	1
227	57	Bila >25-50% pkm dosen sesuai/konsisten dengan roadmap pkm dosen yang bersangkutan	2	1
228	57	Bila ≤25% pkm dosen sesuai/konsisten dengan roadmap pkm dosen yang bersangkutan	1	1
229	58	Bila setiap akan melakukan pkm proposal disetujui program studi dan diseminarkan untuk mencari masukan dan sinkronisasi dengan program institusi	4	1
230	58	Bila setiap akan melakukan pkm proposal disetujui program studi namun tidak harus diseminarkan untuk mencari masukan dan sinkronisasi dengan program institusi	3	1
231	58	Bila setiap akan melakukan proposal disetujui program studi namun tidak diseminarkan untuk mencari masukan dan sinkronisasi dengan program institusi	2	1
232	58	Bila setiap akan melakukan pkm proposal tidak dikoordinasikan dengan program studi	1	1
233	59	Bila >75% hasil pkm diseminarkan untuk mendapatkan masukan dan koreksi	4	1
234	59	Bila > 50-75% hasil pkm diseminarkan untuk mendapatkan masukan dan koreksi	3	1
235	59	Bila >25-50% hasil pkm diseminarkan untuk mendapatkan masukan dan koreksi	2	1
236	59	Bila ≤25% hasil pkm diseminarkan untuk mendapatkan masukan dan koreksi	1	1
237	60	Bila >75% pkm ada luarannya (publikasi, TTG,HaKi dll)	4	1
238	60	Bila >50-75% pkm ada luarannya (publikasi, TTG, HaKi dll)	3	1
239	60	Bila >25-50% pkm ada luarannya (publikasi, TTG, HaKi dll)	2	1
240	60	Bila ≤25% pkm ada luarannya (publikasi, TTG, HaKi dll)	1	1
241	61	Bila >75% pkm dosen ada laporan pelaksanaan pkm dan pertanggungjawaban anggaran pkm	4	1
242	61	Bila >50-75% pkm dosen ada laporan pelaksanaan pkm dan pertanggungjawaban anggaran pkm	3	1
243	61	Bila >25-50% pkm dosen ada laporan pelaksanaan pkm dan pertanggungjawaban anggaran pkm	2	1
244	61	Bila ≤25% pkm dosen ada laporan pelaksanaan pkm dan pertanggungjawaban anggaran pkm	1	1
245	62	Bila >75% pkm dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak	4	1
246	62	Bila\t>50-75%\tpkm\tdosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak	3	1
247	62	Bila\t>25-50%\tpkm\tdosen hasil monev\toleh prodi/reviewer dinyatakan memadai/layak	2	1
248	62	Bila ≤25% pkm dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak	1	1
249	63	Bila hasil monev pkm diumumkan dan ditindaklanjuti untuk perbaikan pkm yang akan datang;	4	1
250	63	Bila hasil monev pkm diumumkan dan tindak lanjutnya tidak dimonitor;	3	1
251	63	Bila hasil monev pkm tidak diumumkan kepada dosen;	2	1
252	63	Bila monev pkm tidak jelas	1	1
253	64	Bila dosen mempunyai publikasi hasil pkm dalam jurnal/buku referensi/monograf/hak paten rata-rata ≥3	4	1
254	64	Bila dosen mempunyai publikasi hasil pkm dalam jurnal/buku referensi/monograf/hak paten rata-rata ≥2	3	1
255	64	Bila dosen mempunyai publikasi hasil pkm dalam jurnal/buku referensi/monograf/hak paten rata-rata ≥1	2	1
256	64	Bila dosen mempunyai publikasi hasil pkm dalam jurnal/buku referensi/monograf/hak paten rata-rata <1	1	1
257	65	Bila >50% dosen mempunyai sertifikat kompetensi dan pernah diundang sebagai narasumber dalam pelaksanaan pkm	4	1
258	65	Bila >50% dosen mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan pkm	3	1
259	65	Bila ada dosen yang mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan pkm	2	1
260	65	Bila tidak ada dosen yang mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan pkm	1	1
261	66	Bila ketersediaan jenis sarana dan prasarana pkm >80- 100% dari yang dibutuhkan	4	1
262	66	Bila ketersediaan jenis sarana dan prasarana pkm >60- 80% dari yang dibutuhkan tersedia	3	1
263	66	Bila ketersediaan jenis sarana dan prasarana pkm >40- 60% yang dibutuhkan tersedia	2	1
264	66	Bila ketersediaan jenis sarana dan prasarana pkm ≤ 40% dari yang dibutuhkan	1	1
265	67	Bila tersedia prosedur penggunaan sarana dan prasarana pkm yang mudah dan sederhana;	4	1
266	67	Bila tersedia prosedur penggunaan sarana dan prasarana pkm yang kurang fleksibel sehingga kadang dapat menganggu pelaksanaan pkm	3	1
267	67	Bila tersedia prosedur penggunaan sarana dan prasarana pkm tidak konsisten sehingga sering menganggu pelaksanaan pkm	2	1
268	67	Bila tidak ada prosedur baku dalam penggunaan sarana dan parasarana	1	1
269	68	Bila telah disusun rencana induk pkm prodi, disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen;	4	1
270	68	Bila telah disusun rencana induk pkm prodi, tidak disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen	3	1
271	68	Bila telah disusun rencana induk pkm prodi, tidak disahkan (dituangkan dalam SK) dan tidak disosialisasikan kepada	2	1
272	68	Bila belum disusun rencana induk pkm prodi	1	1
273	69	Bila telah disusun pedoman pelaksanaan pkm prodi, disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen;	4	1
274	69	Bila telah disusun pedoman pelaksanaan pkm prodi, tidak disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen	3	1
275	69	Bila telah disusun pedoman pelaksanaan pkm prodi, tidak disahkan (dituangkan dalam SK) dan tidak disosialisasikan kepada dosen	2	1
276	69	Bila belum disusun pedoman pelaksanaan pkm prodi	1	1
277	70	Bila hasil evaluasi ketercapaian roapmap pkm prodi diumumkan dan ditindaklanjuti ;	4	1
278	70	Bila hasil evaluasi ketercapaian roapmap pkm prodi diumumkan namun tindaklanjutnya tidak jelas	3	1
279	70	Bila hasil evaluasi ketercapaian roapmap pkm prodi tidak diumumkan	2	1
280	70	Bila evaluasi ketercapaian roapmap pkm prodi tidak dilakukan;	1	1
281	71	Bila >75% pendanaan pkm dosen berasal dari eksternal Unmer Pasuruan	4	1
282	71	Bila > 50-75% pendanaan pkm dosen berasal dari eksternal Unmer Pasuruan	3	1
283	71	Bila >25-50% pendanaan pkm dosen berasal dari eksternal Unmer Pasuruan	2	1
284	71	Bila ≤25% pendanaan pkm dosen berasal dari eksternal Unmer Pasuruan	1	1
285	72	Bila ada sosialisasi panduan dan Lembaga memfasilitasi untuk akses pendanaan eksternal dengan menyediakan dana pendamping	4	1
286	72	Bila ada sosialisasi panduan dan Lembaga memfasilitasi untuk akses pendanaan eksternal namun tidak menyediakan dana pendamping.	3	1
287	72	Bila hanya ada sosialisasi panduan akses dana eksternal (misalnya hibah)	2	1
288	72	Bila tidak pernah ada sosialisasi panduan akses dana eksternal	1	1
\.


--
-- Data for Name: pegawai; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pegawai (id, prodi_id, nama, email, password, status, created_at, remember_token) FROM stdin;
1	1	Wijaya	wijaya@gmail.com	$2y$12$DS0DYkp7cp7BJVtjjX2DIOSBwC0EOWzZpOZ5iJq.xA/h1PgyL/Ehy	1	\N	\N
2	1	Rendi	rendi@gmail.com	$2y$12$cg4qYE3Wss6XVeZv9SbVF.XauJ0pjwZaAA14CUhUeqv6aS4VgB1Qy	1	\N	\N
3	3	Yuli	yuli@gmail.com	$2y$12$NNaAUYwEp9Hi4UVKZqaiTOWaWfBgVGhCsCe0CzJXwTWvQxQt9I4Lm	1	\N	\N
4	4	Yono	yono@gmail.com	$2y$12$wGTXyNuA1.4q0/X/MXse0OTu4tiZUmxhLEFvVfR9E96pSdbgnn15a	1	\N	\N
5	5	Ani	ani@gmail.com	$2y$12$eJmEIZI.1GKAw157W2BKrepOmUwjgXkzng8VqyeFeH/EDAu0eASoO	1	\N	\N
6	1	Andi	andi@gmail.com	$2y$12$zquhWW/VepV4CFAb2.eDKO70rVqvTzHHQhZdtoFnvfOL1912tpaji	1	\N	\N
7	2	Budi	budi@gmail.com	$2y$12$jEPn/eJos9SrKOFXvq797O715z2cr9H7WqaaZyftok/ffbyJNqZk.	1	\N	\N
8	4	Yudi	yudi@gmail.com	$2y$12$v1JGU2yB57EiiFljjIazlupbriUs1CrOwvjUu.RZVE3xNY5GxKYhS	1	\N	\N
9	3	Nina	nina@gmail.com	$2y$12$EnqKREkG3ko8x4PNJ5OuIuEskVLz4PrddcbmcH5Ga.cnZrGGDSuoy	1	\N	\N
10	5	Widia	widia@gmail.com	$2y$12$1SwDnPp.l3bEyoytH23HbuwDQaFB7K0bQ7XSGgLD8ujzXEd5HN3FO	1	\N	\N
11	2	Judin	judin@gmail.com	$2y$12$.6Cn4jKhX3.MzBbStAyF5eMRSATFc1/XFVDFXbBsDWNvW3LZ9fhW2	1	\N	\N
12	3	Wati	wati@gmail.com	$2y$12$Q411qQ3cNfvXC5m3wV7Jx.89sHyf.66Fp7cMVrp7trokTaD3vKZ.O	1	\N	\N
13	5	Lisa	lisa@gmail.com	$2y$12$g0WQaIXpN8xp6YPs/ajrs.vEiYKOtY1veCunHfIWTuuHoVJDG2RCW	1	\N	\N
14	1	Wira	wira@gmail.com	$2y$12$DTVEJH8gjNxolYjR5XMbq.t2w0Tm2acfRWIGC3SBAjJU/hP.kCuxW	1	\N	\N
15	2	David	david@gmail.com	$2y$12$ld02bqWG4jXXKEvOvPaQ/eB0dxctRRORy6a/tUZSGdkakkh/PREQy	1	\N	\N
16	4	Restu	restu@gmail.com	$2y$12$X7uafpuc7x6PxDXeoVRbvuBYZwca8VG35jw1aut/qev71fp/a26ry	1	\N	\N
17	3	Dani	dani@gmail.com	$2y$12$twOXWgUSx7DnOunyjiRih.6VhlZIxE9l.rwZBxmdAxO1aOxQ9LhWi	1	\N	\N
18	5	Rian	rian@gmail.com	$2y$12$dX5zeMwJ3KYHqK4gVqqh9u3PQqXitfSOM1/siCWFOCNae8S3t5uou	1	\N	\N
\.


--
-- Data for Name: pengisian; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pengisian (id, indikator_id, pegawai_id, program_studi, audhitor, nilai, komentar, tahun, tanggal, aksi_code) FROM stdin;
20	1	6	1	17	40	contoh komentar	2022	02/03/2022	2
21	2	6	1	17	60	<p>contoh komentar<br></p>	2022	02/03/2022	2
22	3	6	1	17	100	<p>contoh komentar</p><p><br></p>	2022	02/03/2022	2
23	4	6	1	17	100	<p>contoh komentar<br></p>	2022	02/03/2022	2
24	5	6	1	17	40	<p>contoh komentar<br></p>	2022	02/03/2022	2
25	6	6	1	17	60	<p>contoh komentar<br></p>	2022	02/03/2022	2
26	7	6	1	\N	80	\N	2022	02/03/2022	2
27	8	6	1	17	30	<p>contoh komentar<br></p>	2022	02/03/2022	2
28	9	6	1	\N	120	\N	2022	02/03/2022	2
38	1	8	4	13	60	<p>Contoh Komentar<br></p>	2022	02/03/2022	2
39	2	8	4	\N	80	\N	2022	02/03/2022	2
40	3	8	4	13	50	<p>Contoh Komentar<br></p>	2022	02/03/2022	2
41	4	8	4	\N	100	\N	2022	02/03/2022	2
42	5	8	4	13	20	<p>Contoh Komentar<br></p>	2022	02/03/2022	2
43	6	8	4	\N	80	\N	2022	02/03/2022	2
44	7	8	4	\N	80	\N	2022	02/03/2022	2
45	8	8	4	13	30	<p>Contoh Komentar<br></p>	2022	02/03/2022	2
46	9	8	4	\N	120	\N	2022	02/03/2022	2
47	1	6	1	17	40	<p>Contoh Komentar</p>	2023	20/02/2023	2
48	2	6	1	\N	80	\N	2023	20/02/2023	2
49	3	6	1	\N	100	\N	2023	20/02/2023	2
50	4	6	1	17	75	<p>Contoh Komentar</p>	2023	20/02/2023	2
51	5	6	1	17	20	<p>Contoh Komentar</p>	2023	20/02/2023	2
52	6	6	1	\N	80	\N	2023	20/02/2023	2
78	2	6	1	17	3	<p>Contoh Komentar</p>	2024	\N	1
79	3	6	1	17	4	<p>Contoh Komentar<br></p>	2024	\N	1
80	4	6	1	17	2	<p>Contoh Komentar<br></p>	2024	\N	1
81	5	6	1	17	4	<p>Contoh Komentar<br></p>	2024	\N	1
\.


--
-- Data for Name: pengisian_berkas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pengisian_berkas (id, indikator_id, pengisian_id, program_studi_id, pegawai_id, jenis, deskripsi, nama_file, nama_asli) FROM stdin;
37	6	52	1	6	Penetapan	Contoh Deskripsi	5f5538a1b860c44b8dfec7653ffd28dc.pdf	File Penetapan
38	6	52	1	6	Pelaksanaan	<p>Deskripsi</p>	4b306fb11dc70d5a75fdd1f8772aa2b8.docx	File Pelaksanaan
39	5	51	1	6	Penetapan	<font color="#575962">Contoh Deskripsi</font>	3f293c95eb9837a09564567ff3e8e109.pdf	File Penetapan
41	5	51	1	6	Pelaksanaan	<p>Contoh deskripsi</p>	84749a2d540f8c1f6a57e2f74014fa11.docx	File Pelaksanaan
42	5	51	1	6	Pelaksanaan	<p>Contoh deskripsi</p>	b8ec44928bfec922352bee4e8aa3c98a.pdf	File Pelaksanaan
43	4	50	1	6	Penetapan	<p>Deskripsi</p>	efa135eea1711cc74c476e8ab08ba03e.pdf	File Penetapan
44	4	50	1	6	Pelaksanaan	<p>Contoh Deskripsi</p>	52e8aa4fab591eeb123484e26c3256e3.pdf	File Pelaksanaan
45	4	50	1	6	Pelaksanaan	<p>Contoh Deskripsi</p>	4767503cb5c122c9d2af6c9343e547e1.docx	File Pelaksanaan
46	3	49	1	6	Penetapan	<p>Contoh Dekskripsi</p>	abb196a9f46647eca0b055bfdb4a223f.docx	File Penetapan
47	3	49	1	6	Penetapan	<p>Contoh Dekskripsi</p>	203c46efa2118ed8343f20378ab0075e.pdf	File Penetapan
48	3	49	1	6	Pelaksanaan	<span style="color: rgb(87, 89, 98);">Contoh Deskripsi</span>	e688f003d2a2f6e3605d800a577283d8.pdf	File Pelaksanaan
49	2	48	1	6	Penetapan	<p><font color="#575962" face="sans-serif">Contoh Deskripsi</font><br></p>	9368c7dbcdf94fd0e2e0c1278f1f8ecd.pdf	File Penetapan
51	2	48	1	6	Pelaksanaan	<p>Contoh Deskripsi<br></p>	6202711473aabd26d2a3266b430d3652.pdf	File Pelaksanaan
52	1	47	1	6	Pelaksanaan	<p>Contoh Deskripsi<br></p>	607fb5f9e1cec7aecc74eeda347e53ad.pdf	File Pelaksanaan
54	1	47	1	1	Penetapan	<p>Contoh Deskripsi</p>	ce2dc25fb75db845dc9e24d1691609c4.pdf	File Penetapan
55	5	60	1	1	Penetapan	<p>Contoh Deskripsi</p>	02755acf285018a05bcd4ec1c5281672.pdf	File Penetapan
56	5	60	1	1	Pelaksanaan	<p>Deskripsi</p><p><br></p>	521f40d3f6491c1ad90cd85f13f2ef69.pdf	File Pelaksanaan
60	4	59	1	1	Penetapan	<p>Contoh Deskripsi</p>	933dc6f6f0ad19d5e20ac80f8d055c51.pdf	File Penetapan
61	4	59	1	1	Pelaksanaan	<p>Contoh Deskripsi</p>	08eef0cfb2eef77de7397315edea9fa9.pdf	File Pelaksanaan
62	3	58	1	1	Penetapan	<p>Deskripsi</p>	3d69b2dfb2eebb87aec0543f17b00298.pdf	File Penetapan
63	3	58	1	1	Pelaksanaan	<p>Contoh Deskripsi</p>	73569f42b356bc7cdea7b11d92a08c8e.pdf	File Pelaksanaan
64	2	57	1	1	Penetapan	<p>Contoh Deskripsi</p>	5a1bab317838e3e0864589268aaef58e.pdf	File Penetapan
65	2	57	1	1	Pelaksanaan	<p>Contoh Deskripsi</p>	51319649a98b10fe684b37f9ef707b08.pdf	File Pelaksanaan
66	5	81	1	6	Penetapan	<p>Contoh Deskripsi</p>	6c71824a46405a62a7cb3fdec0687f16.pdf	File Penetapan
67	5	81	1	6	Pelaksanaan	<p>Contoh Deskrips</p>	29c43d9e5e097973d4f3d3ad2d632f72.pdf	File Pelaksanaan
68	4	80	1	6	Penetapan	<p>Contoh Deskrips<br></p>	df1fdf6e64dee1fb137ebe1053cf2ef1.pdf	File Penetapan
69	4	80	1	6	Pelaksanaan	<p>Contoh Deskrips<br></p>	b495ecba7f1e4c53c2af853d52f61eca.pdf	File Pelaksanaan
70	3	79	1	6	Pelaksanaan	<p>Contoh Deskrips<br></p>	306174c151524837ca2504760aedb2ff.pdf	File Pelaksanaan
71	3	79	1	6	Pelaksanaan	<p>Contoh Deskripsi<br></p>	924766283e0271b9128244554496a7ad.pdf	File Pelaksanaan
72	3	79	1	6	Penetapan	<p>Contoh Deskripsi<br></p>	fa9558ace5b840c09c834663dd2423ab.pdf	File Penetapan
73	2	78	1	6	Penetapan	<p>Contoh Deskripsi<br></p>	90f38e3d84368ce7b1e0f804ad172143.pdf	File Penetapan
75	2	78	1	6	Pelaksanaan	<p>Contoh Deskripsi<br></p>	e9250624e902e3e9e01949a5b944afed.pdf	File Pelaksanaan
\.


--
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.permissions (id, name, guard_name, created_at, updated_at) FROM stdin;
1	kelola fakultas	web	2023-12-25 20:34:01+00	2023-12-25 20:34:01+00
2	kelola prodi	web	2023-12-25 21:53:25+00	2023-12-25 21:53:25+00
3	kelola pegawai	web	2023-12-25 21:53:33+00	2023-12-25 21:53:33+00
4	kelola jabatan	web	2023-12-25 22:51:53+00	2023-12-25 22:51:53+00
5	kelola standard	web	2023-12-26 17:14:06+00	2023-12-26 17:14:06+00
6	kelola bookmanual	web	2023-12-26 17:17:14+00	2023-12-26 17:17:14+00
7	kelola bookstandard	web	2023-12-26 17:17:30+00	2023-12-26 17:17:30+00
8	kelola bookdocs	web	2023-12-26 17:17:49+00	2023-12-26 17:17:49+00
9	kelola indikator	web	2023-12-26 17:18:05+00	2023-12-26 17:18:05+00
11	kelola nilai	web	2023-12-26 17:18:38+00	2023-12-26 17:18:38+00
12	kelola berkas	web	2023-12-26 17:18:58+00	2023-12-26 17:18:58+00
14	kelola bobot	web	2024-02-07 06:48:50+00	2024-02-07 06:48:50+00
15	kelola statistik	web	2024-02-14 07:08:16+00	2024-02-14 07:08:16+00
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: program_studi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.program_studi (id, fakultas_id, nama) FROM stdin;
1	1	Teknik Informatika
2	1	Rekayasa Perangkat Lunak
3	3	Manajemen
4	4	Hukum
5	5	Agroteknologi
\.


--
-- Data for Name: role_has_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.role_has_permissions (permission_id, role_id) FROM stdin;
1	1
2	1
3	1
4	1
5	11
6	11
7	11
8	11
9	11
11	11
12	12
14	11
15	1
15	11
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id, name, guard_name, created_at, updated_at) FROM stdin;
1	Admin	web	2023-12-25 20:32:45+00	2023-12-26 00:58:52+00
6	Auditor Informatika	web	2024-01-06 20:24:49+00	2024-01-15 03:27:12+00
7	Auditor RPL	web	2024-01-06 20:24:49+00	2024-01-15 03:27:24+00
8	Auditor Manajemen	web	2024-01-06 20:24:50+00	2024-01-15 03:27:34+00
9	Auditor Hukum	web	2024-01-06 20:24:50+00	2024-01-15 03:27:44+00
10	Auditor Agroteknologi	web	2024-01-06 20:24:50+00	2024-01-15 03:27:54+00
11	PPM	web	2024-01-17 07:32:39+00	2024-01-17 07:32:39+00
12	Ketua Program Studi	web	2024-01-17 07:33:01+00	2024-01-17 07:33:01+00
13	Dosen	web	2024-01-30 21:04:12+00	2024-01-30 21:04:12+00
\.


--
-- Data for Name: standard; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.standard (id, pegawai_id, nama, status) FROM stdin;
1	1	Standar Kompetensi Lulusan	1
2	1	Standar Isi Pembelajaran	1
3	1	Standar Proses Pembelajaran	1
4	1	Standar Penilaian Pembelajaran	1
5	1	Standar Dosen dan Tenaga Kependidikan	1
6	1	Standar Sarana Prasarana Pembelajaran	1
7	1	Standar Pengelolaan Pembelajaran	1
8	1	Standar Pembiayaan Pembelajaran	1
9	1	Standar Hasil Penelitian	1
10	1	Standar Isi Penelitian	1
11	1	Standar Proses Penelitian	1
12	1	Standar Penilaian Penelitian	1
13	1	Standar Peneliti	1
14	1	Standar Sarana Dan Prasarana Penelitian	1
15	1	Standar Pengelolaan Penelitian	1
16	1	Standar Pendanaan Dan Pembiayaan Penelitian	1
17	1	Standar Hasil Pengabdian Kepada Masyarakat	1
18	1	Standar Isi Pengabdian Kepada Masyarakat	1
19	1	Standar Proses Pengabdian Kepada Masyarakat	1
20	1	Standar Penilaian Pengabdian Kepada Masyarakat	1
21	1	Standar Pelaksana Pengabdian Kepada Masyarakat	1
22	1	Standar Sarana Dan Prasarana Pengabdian Kepada Masyarakat	1
23	1	Standar Pengelolaan Pengabdian Kepada Masyarakat	1
24	1	Standar Pendanaan Dan Pembiayaan Pengabdian Kepada Masyarakat	1
\.


--
-- Name: bobot_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bobot_id_seq', 72, true);


--
-- Name: bookdocs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bookdocs_id_seq', 1, true);


--
-- Name: bookmanual_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bookmanual_id_seq', 1, true);


--
-- Name: bookstandard_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bookstandard_id_seq', 1, true);


--
-- Name: fakultas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.fakultas_id_seq', 5, true);


--
-- Name: indikator_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.indikator_id_seq', 72, true);


--
-- Name: indikator_jenis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.indikator_jenis_id_seq', 1, true);


--
-- Name: jenis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jenis_id_seq', 1, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 2, true);


--
-- Name: nilai_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.nilai_id_seq', 288, true);


--
-- Name: pegawai_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pegawai_id_seq', 18, true);


--
-- Name: pengisian_berkas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pengisian_berkas_id_seq', 75, true);


--
-- Name: pengisian_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pengisian_id_seq', 81, true);


--
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permissions_id_seq', 15, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, true);


--
-- Name: program_studi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.program_studi_id_seq', 5, true);


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_seq', 13, true);


--
-- Name: standard_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.standard_id_seq', 24, true);


--
-- Name: bobot idx_16798_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bobot
    ADD CONSTRAINT idx_16798_primary PRIMARY KEY (id);


--
-- Name: bookdocs idx_16804_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookdocs
    ADD CONSTRAINT idx_16804_primary PRIMARY KEY (id);


--
-- Name: bookmanual idx_16813_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookmanual
    ADD CONSTRAINT idx_16813_primary PRIMARY KEY (id);


--
-- Name: bookstandard idx_16821_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookstandard
    ADD CONSTRAINT idx_16821_primary PRIMARY KEY (id);


--
-- Name: fakultas idx_16828_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fakultas
    ADD CONSTRAINT idx_16828_primary PRIMARY KEY (id);


--
-- Name: indikator idx_16834_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.indikator
    ADD CONSTRAINT idx_16834_primary PRIMARY KEY (id);


--
-- Name: indikator_jenis idx_16843_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.indikator_jenis
    ADD CONSTRAINT idx_16843_primary PRIMARY KEY (id);


--
-- Name: jenis idx_16848_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jenis
    ADD CONSTRAINT idx_16848_primary PRIMARY KEY (id);


--
-- Name: migrations idx_16854_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT idx_16854_primary PRIMARY KEY (id);


--
-- Name: model_has_permissions idx_16858_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT idx_16858_primary PRIMARY KEY (permission_id, model_id, model_type);


--
-- Name: model_has_roles idx_16863_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT idx_16863_primary PRIMARY KEY (role_id, model_id, model_type);


--
-- Name: nilai idx_16869_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nilai
    ADD CONSTRAINT idx_16869_primary PRIMARY KEY (id);


--
-- Name: pegawai idx_16877_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pegawai
    ADD CONSTRAINT idx_16877_primary PRIMARY KEY (id);


--
-- Name: pengisian idx_16887_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian
    ADD CONSTRAINT idx_16887_primary PRIMARY KEY (id);


--
-- Name: pengisian_berkas idx_16894_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian_berkas
    ADD CONSTRAINT idx_16894_primary PRIMARY KEY (id);


--
-- Name: permissions idx_16904_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT idx_16904_primary PRIMARY KEY (id);


--
-- Name: personal_access_tokens idx_16909_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT idx_16909_primary PRIMARY KEY (id);


--
-- Name: program_studi idx_16916_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.program_studi
    ADD CONSTRAINT idx_16916_primary PRIMARY KEY (id);


--
-- Name: roles idx_16922_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT idx_16922_primary PRIMARY KEY (id);


--
-- Name: role_has_permissions idx_16926_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT idx_16926_primary PRIMARY KEY (permission_id, role_id);


--
-- Name: standard idx_16932_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.standard
    ADD CONSTRAINT idx_16932_primary PRIMARY KEY (id);


--
-- Name: idx_16798_fk_bobot_indikator; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16798_fk_bobot_indikator ON public.bobot USING btree (indikator_id);


--
-- Name: idx_16804_fk_book_standard; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16804_fk_book_standard ON public.bookdocs USING btree (standard_id);


--
-- Name: idx_16813_fk_bookmanual_pegawai; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16813_fk_bookmanual_pegawai ON public.bookmanual USING btree (pegawai_id);


--
-- Name: idx_16813_fk_bookmanual_standard; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16813_fk_bookmanual_standard ON public.bookmanual USING btree (standard_id);


--
-- Name: idx_16821_fk_bookstandard_pegawai; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16821_fk_bookstandard_pegawai ON public.bookstandard USING btree (pegawai_id);


--
-- Name: idx_16821_fk_bookstandard_standard; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16821_fk_bookstandard_standard ON public.bookstandard USING btree (standard_id);


--
-- Name: idx_16834_fk_indikator_pegawai; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16834_fk_indikator_pegawai ON public.indikator USING btree (pegawai_id);


--
-- Name: idx_16834_fk_indikator_standard; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16834_fk_indikator_standard ON public.indikator USING btree (standard_id);


--
-- Name: idx_16843_fk_indikator; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16843_fk_indikator ON public.indikator_jenis USING btree (indikator_id);


--
-- Name: idx_16843_fk_jenis; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16843_fk_jenis ON public.indikator_jenis USING btree (jenis_id);


--
-- Name: idx_16858_model_has_permissions_model_id_model_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16858_model_has_permissions_model_id_model_type_index ON public.model_has_permissions USING btree (model_id, model_type);


--
-- Name: idx_16863_model_has_roles_model_id_model_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16863_model_has_roles_model_id_model_type_index ON public.model_has_roles USING btree (model_id, model_type);


--
-- Name: idx_16869_fk_nilai_indikator; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16869_fk_nilai_indikator ON public.nilai USING btree (indikator_id);


--
-- Name: idx_16877_fk_pegawai_prodi; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16877_fk_pegawai_prodi ON public.pegawai USING btree (prodi_id);


--
-- Name: idx_16887_fk_pengisian_audhitor; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16887_fk_pengisian_audhitor ON public.pengisian USING btree (audhitor);


--
-- Name: idx_16887_fk_pengisian_indikator; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16887_fk_pengisian_indikator ON public.pengisian USING btree (indikator_id);


--
-- Name: idx_16887_fk_pengisian_pegawai; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16887_fk_pengisian_pegawai ON public.pengisian USING btree (pegawai_id);


--
-- Name: idx_16887_program_studi; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16887_program_studi ON public.pengisian USING btree (program_studi);


--
-- Name: idx_16894_fk_indikator_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16894_fk_indikator_id ON public.pengisian_berkas USING btree (indikator_id);


--
-- Name: idx_16894_fk_pengisian_berkas_pegawai; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16894_fk_pengisian_berkas_pegawai ON public.pengisian_berkas USING btree (pegawai_id);


--
-- Name: idx_16894_fk_program_studi_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16894_fk_program_studi_id ON public.pengisian_berkas USING btree (program_studi_id);


--
-- Name: idx_16904_permissions_name_guard_name_unique; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX idx_16904_permissions_name_guard_name_unique ON public.permissions USING btree (name, guard_name);


--
-- Name: idx_16909_personal_access_tokens_token_unique; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX idx_16909_personal_access_tokens_token_unique ON public.personal_access_tokens USING btree (token);


--
-- Name: idx_16909_personal_access_tokens_tokenable_type_tokenable_id_in; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16909_personal_access_tokens_tokenable_type_tokenable_id_in ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: idx_16916_fk_program_studi_fakultas; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16916_fk_program_studi_fakultas ON public.program_studi USING btree (fakultas_id);


--
-- Name: idx_16922_roles_name_guard_name_unique; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX idx_16922_roles_name_guard_name_unique ON public.roles USING btree (name, guard_name);


--
-- Name: idx_16926_role_has_permissions_role_id_foreign; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16926_role_has_permissions_role_id_foreign ON public.role_has_permissions USING btree (role_id);


--
-- Name: idx_16932_fk_standard_pegawai; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_16932_fk_standard_pegawai ON public.standard USING btree (pegawai_id);


--
-- Name: bobot fk_bobot_indikator; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bobot
    ADD CONSTRAINT fk_bobot_indikator FOREIGN KEY (indikator_id) REFERENCES public.indikator(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: bookdocs fk_book_standard; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookdocs
    ADD CONSTRAINT fk_book_standard FOREIGN KEY (standard_id) REFERENCES public.standard(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: bookmanual fk_bookmanual_pegawai; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookmanual
    ADD CONSTRAINT fk_bookmanual_pegawai FOREIGN KEY (pegawai_id) REFERENCES public.pegawai(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: bookmanual fk_bookmanual_standard; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookmanual
    ADD CONSTRAINT fk_bookmanual_standard FOREIGN KEY (standard_id) REFERENCES public.standard(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: bookstandard fk_bookstandard_pegawai; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookstandard
    ADD CONSTRAINT fk_bookstandard_pegawai FOREIGN KEY (pegawai_id) REFERENCES public.pegawai(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: bookstandard fk_bookstandard_standard; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookstandard
    ADD CONSTRAINT fk_bookstandard_standard FOREIGN KEY (standard_id) REFERENCES public.standard(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: indikator_jenis fk_indikator; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.indikator_jenis
    ADD CONSTRAINT fk_indikator FOREIGN KEY (indikator_id) REFERENCES public.indikator(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: pengisian_berkas fk_indikator_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian_berkas
    ADD CONSTRAINT fk_indikator_id FOREIGN KEY (indikator_id) REFERENCES public.indikator(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: indikator fk_indikator_pegawai; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.indikator
    ADD CONSTRAINT fk_indikator_pegawai FOREIGN KEY (pegawai_id) REFERENCES public.pegawai(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: indikator fk_indikator_standard; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.indikator
    ADD CONSTRAINT fk_indikator_standard FOREIGN KEY (standard_id) REFERENCES public.standard(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: indikator_jenis fk_jenis; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.indikator_jenis
    ADD CONSTRAINT fk_jenis FOREIGN KEY (jenis_id) REFERENCES public.jenis(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: nilai fk_nilai_indikator; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nilai
    ADD CONSTRAINT fk_nilai_indikator FOREIGN KEY (indikator_id) REFERENCES public.indikator(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: pegawai fk_pegawai_prodi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pegawai
    ADD CONSTRAINT fk_pegawai_prodi FOREIGN KEY (prodi_id) REFERENCES public.program_studi(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: pengisian fk_pengisian_audhitor; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian
    ADD CONSTRAINT fk_pengisian_audhitor FOREIGN KEY (audhitor) REFERENCES public.pegawai(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: pengisian_berkas fk_pengisian_berkas_pegawai; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian_berkas
    ADD CONSTRAINT fk_pengisian_berkas_pegawai FOREIGN KEY (pegawai_id) REFERENCES public.pegawai(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: pengisian fk_pengisian_indikator; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian
    ADD CONSTRAINT fk_pengisian_indikator FOREIGN KEY (indikator_id) REFERENCES public.indikator(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: pengisian fk_pengisian_pegawai; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian
    ADD CONSTRAINT fk_pengisian_pegawai FOREIGN KEY (pegawai_id) REFERENCES public.pegawai(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: pengisian_berkas fk_program_studi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian_berkas
    ADD CONSTRAINT fk_program_studi FOREIGN KEY (program_studi_id) REFERENCES public.program_studi(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: program_studi fk_program_studi_fakultas; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.program_studi
    ADD CONSTRAINT fk_program_studi_fakultas FOREIGN KEY (fakultas_id) REFERENCES public.fakultas(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: standard fk_standard_pegawai; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.standard
    ADD CONSTRAINT fk_standard_pegawai FOREIGN KEY (pegawai_id) REFERENCES public.pegawai(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: pengisian pengisian_fk_prodi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengisian
    ADD CONSTRAINT pengisian_fk_prodi FOREIGN KEY (program_studi) REFERENCES public.program_studi(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- PostgreSQL database dump complete
--

